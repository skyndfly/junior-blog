import React, { SyntheticEvent, useEffect, useState } from 'react';
import ReactDOM from 'react-dom/client';
import Form from "./components/Form";
import Comments from "./components/Comments";

interface Comment {
    id: number;
    name: string;
    comment: string;
}

const App: React.FC = () => {
    const appElement = document.getElementById('app');
    const id = appElement?.getAttribute('data-id') || '';
    const name = appElement?.getAttribute('data-name') || '';
    const [comment, setComment] = useState<string>('');
    const [errorStatus, setErrorStatus] = useState<boolean>(false);
    const [error, setError] = useState<string>('');
    const [responseError, setResponseError] = useState<string>('');
    const [alertType, setAlertType] = useState<'success' | 'error'>('error');
    const [alertOpen, setAlertOpen] = useState<boolean>(false);
    const [comments, setComments] = useState<Comment[]>([]);
    const [page, setPage] = useState<number>(1);
    const [loading, setLoading] = useState<boolean>(false);
    const [hasMore, setHasMore] = useState<boolean>(true);

    const fetchComments = async (page: number) => {
        setLoading(true);
        try {
            const response = await fetch(`/comments/get-all-paginate?page=${page}`);
            const data = await response.json();
            if (data.last_page === page) {
                setHasMore(false);
            }
                setComments((prev) => [...prev, ...data.data]);

        } catch (error) {
            setResponseError('Ошибка загрузки комментариев.');
            setAlertOpen(true);
            setAlertType('error');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchComments(page);
    }, [page]);

    useEffect(() => {
        const handleScroll = () => {
            const scrollY = window.scrollY;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;

            if (documentHeight - (scrollY + windowHeight) <= 50 && hasMore && !loading) {
                setPage((prev) => prev + 1);
            }
        };

        window.addEventListener('scroll', handleScroll);
        return () => {
            window.removeEventListener('scroll', handleScroll);
        };
    }, [hasMore, loading]);

    const handleChangeComment = (e: React.ChangeEvent<HTMLTextAreaElement>) => {
        setComment(e.target.value);
        setErrorStatus(false);
    };

    const handleResponse = async (response: Response) => {
        const data = await response.json();
        setResponseError(data['message']);
        setAlertOpen(true);
        setAlertType(!response.ok ? 'error' : 'success');
    };

    const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        if (comment.trim() === '') {
            setError('Комментарий не может быть пустым.');
            setErrorStatus(true);
            return;
        }
        if (comment.length < 3) {
            setError('Комментарий должен содержать не менее 3 символов.');
            setErrorStatus(true);
            return;
        }

        const formData = new FormData();
        formData.append('comment', comment);
        formData.append('id', id);
        formData.append('name', name);

        try {
            const response = await fetch('/comments/add-comment-auth', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
            });
            await handleResponse(response);
        } catch (error) {
            setError('Ошибка при отправке комментария. Пожалуйста, попробуйте еще раз.');
        }
    };

    return (
        <>
            <Form
                alertType={alertType}
                errorStatus={errorStatus}
                error={error}
                responseError={responseError}
                alertOpen={alertOpen}
                handleSubmit={handleSubmit}
                handleChangeComment={handleChangeComment}
                setAlertOpen={setAlertOpen}
            />
            <Comments
                comments={comments}
                loading={loading}
                hasMore={hasMore}
            />
        </>
    );
};

const root = ReactDOM.createRoot(document.getElementById('app') as HTMLElement);
root.render(<App />);
