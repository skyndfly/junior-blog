<?php

namespace Tests\Feature\Articles;

use App\Contracts\Articles\ArticleGetSimilarServiceContract;
use App\Contracts\Articles\ArticleShowServiceContract;
use App\Models\Article;
use App\Models\Category;
use App\Repository\Article\GetSimilar\ViewCollection;
use App\Repository\Article\Show\Dto as ArticleShowDto;
use DomainException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\MockObject\Exception;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Tests\TestCase;

class ArticleShowTest extends TestCase
{
    use RefreshDatabase;
    protected ArticleShowServiceContract $articleShowService;
    protected ArticleGetSimilarServiceContract $articleGetSimilarService;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->articleShowService = $this->createMock(ArticleShowServiceContract::class);
        $this->articleGetSimilarService = $this->createMock(ArticleGetSimilarServiceContract::class);

    }

    /**
     * @throws UnknownProperties
     */
    public function test_show_returns_view_with_article_and_similar_articles()
    {
        /** @var Category $category */
        $category = Category::factory()->create();
        $article = Article::factory()->create();
        $show_dto = new ArticleShowDto(array_merge($article->toArray(), ['category' => $category->getName()]));
        $this->articleShowService
            ->method('execute')
            ->willReturn($show_dto);
        $this->articleGetSimilarService
            ->method('execute')
            ->willReturn(new ViewCollection());

        $response = $this->get(route('article.show', $article->slug));

        $response->assertViewIs('article.show');
        $response->assertViewHas('article', $show_dto);
        $response->assertViewHas('similarArticles', []);
    }

    public function testShowHandlesUnknownPropertiesException()
    {
        /** @var Category $category */
        $category = Category::factory()->create();
        $article = Article::factory()->create();
        $this->articleShowService
            ->method('execute')
            ->willThrowException(new UnknownProperties('Test Exception'));
        $response = $this->get(route('article.show', $article->slug));
        $response->assertViewIs('article.show');
    }

    /**
     * @throws UnknownProperties
     */
    public function testShowHandlesDomainException()
    {
        /** @var Category $category */
        $category = Category::factory()->create();
        $article = Article::factory()->create();
        $this->articleShowService
            ->method('execute')
            ->willThrowException(new DomainException('Test Exception'));
        $response = $this->get(route('article.show', $article->slug));
        $response->assertRedirect('/');
    }
}
