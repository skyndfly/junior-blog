import React, {useState} from "react";
import Alert from "./Alert";

interface FormProps {
    alertType: 'success' | 'error';
    errorStatus: boolean;
    error: string;
    responseError: string;
    alertOpen: boolean;
    handleSubmit: (e: React.FormEvent<HTMLFormElement>) => void;
    handleChangeComment: (e) => void;
    setAlertOpen: (boolean) => void;
}

const Form: React.FC<FormProps> = ({alertType, errorStatus, error, responseError, alertOpen, handleSubmit, handleChangeComment, setAlertOpen}) => {


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
