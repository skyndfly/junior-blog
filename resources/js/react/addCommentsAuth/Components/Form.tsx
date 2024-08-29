import React, {useState} from "react";
import Alert from "./Alert";

interface FormProps {
    id: string | null | undefined;
    name: string | null | undefined;
}

const Form: React.FC<FormProps> = ({id, name}) => {
    const [comment, setComment] = useState<string>('');
    const [errorStatus, setErrorStatus] = useState<boolean>(false);
    const [error, setError] = useState<string>('');
    const [responseError, setResponseError] = useState<string>('');
    const [alertOpen, setAlertOpen] = useState<boolean>(false);
    const [alertType, setAlertType] = useState<'success' | 'error'>('error');


    const handleChangeComment = (e) => {
        setComment(e.target.value);
        setErrorStatus(false);
    }
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
            const response = await fetch('/articles/add-comment-auth', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
            });
            if (!response.ok) {
                const data = await response.json();
                setResponseError(data['message']);
                setAlertOpen(true);
                setAlertType('error');
                console.log(data)
            } else {
                const data = await response.json();
                setResponseError(data['message']);
                setAlertOpen(true);
                setAlertType('success')
                console.log(data)

            }

        } catch (error) {
            setError('Ошибка при отправке комментария');
        }
    }
    return (
        <>
            <form action="" method="post" onSubmit={handleSubmit}>
                <input type="hidden" name="id"/>
                <input type="hidden" name="id"/>
                <p className="font-bold text-purple-950">Оставить комментарий</p>
                <div className="w-[550px]">
                    <div className="mt-2">
                        <div
                            className="rounded-md shadow-sm ring-1 ring-inset  bg-white ring-purple-800 focus-within:ring-1 focus-within:ring-inset focus-within:ring-purple-700 "
                        >
                        <textarea
                            onChange={(e) => {
                                handleChangeComment(e)
                            }}
                            name="comment"
                            id="comment"
                            className="block w-full border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                        >
                        </textarea>
                        </div>
                    </div>
                </div>
                <div className="text-red-500" style={{minHeight: '25px'}}>
                    {
                        errorStatus && error
                    }
                </div>
                <button
                    type="submit"
                    className="bg-purple-950 hover:bg-purple-700 text-white font-bold py-2 px-4 mt-2 rounded w-[200px]"
                >
                    Отправить
                </button>
                {
                    alertOpen && <Alert
                    open={alertOpen}
                    message={responseError}
                    type={alertType}
                    setOpen={setAlertOpen}
                />
                }
            </form>


        </>
    );
}
export default Form;
