import React from 'react';
import ReactDOM from 'react-dom/client';
import Form from "./Components/Form";

const App: React.FC = () => {
    const appElement = document.getElementById('app');
    const id = appElement?.getAttribute('data-id');
    const name = appElement?.getAttribute('data-name');
    return (
        <Form id={id} name={name} />
    );
};

const root = ReactDOM.createRoot(document.getElementById('app') as HTMLElement);
root.render(<App />);
