import React from "react";

interface Comment {
    id: number;
    name: string;
    comment: string;
    created_at: string;
}

interface CommentsProps {
    comments: Comment[];
    loading: boolean;
    hasMore: boolean;
}

const Comments: React.FC<CommentsProps> = ({ comments, loading }) => {
    return (
        <>
            <div
                className="flex flex-col gap-2 mt-2 "
                style={{minHeight: "400px"}}
            >
                {comments.map((comment) => (
                    <div
                        key={comment.id}
                        className="bg-white py-6 px-2 rounded-md"
                    >
                        <div
                            className="flex justify-between items-center mb-2"
                        >
                            <span
                                className="text-2xl font-bold "
                                style={{color:"#374151"}}
                            >
                                {comment.name}
                            </span>
                            <span
                                lassName="text-sm"
                                style={{color:"#6b7280"}}
                            >
                                {comment.created_at}
                            </span>
                        </div>
                        <p>{comment.comment}</p>
                        <div
                            className="text-sm mt-4"
                            style={{color:"rgba(55,65,81,0.54)"}}
                        >
                            В активном поиске работы
                        </div>

                    </div>
                ))}
            </div>
            {loading && <p>Loading...</p>}
        </>
    );
};

export default Comments;
