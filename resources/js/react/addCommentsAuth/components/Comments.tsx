import React from "react";

interface Comment {
    id: number;
    name: string;
    comment: string;
}

interface CommentsProps {
    comments: Comment[];
    loading: boolean;
    hasMore: boolean;
}

const Comments: React.FC<CommentsProps> = ({ comments, loading }) => {
    return (
        <>
            <div className="">
                {comments.map((comment) => (
                    <div key={comment.id} style={{ height: '100px', backgroundColor: "gray" }}>
                        {comment.id} - {comment.name}: {comment.comment}
                    </div>
                ))}
            </div>
            {loading && <p>Loading...</p>}
        </>
    );
};

export default Comments;
