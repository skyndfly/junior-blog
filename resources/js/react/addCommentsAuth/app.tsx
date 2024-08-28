import React from 'react';
import ReactDOM from 'react-dom/client';
import Form from "./Components/Form";

const App: React.FC = () => {
    return (
        <Form />
    );
};

const root = ReactDOM.createRoot(document.getElementById('app') as HTMLElement);
root.render(<App />);
