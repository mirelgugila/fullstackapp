import React, { useEffect, useContext } from 'react';
// import './styles/App.scss';
import 'bootstrap/dist/css/bootstrap.min.css';
import Routes from './Routes';
import { store } from './store.js';

const StateWrapper = () => {
    const globalState = useContext(store);
    const { dispatch } = globalState;
    
    useEffect(() => {
        _onResize();
        window.addEventListener('resize', _onResize);
    }, []);

    const _onResize = () => {
        const width = window.innerWidth;
        dispatch({ type: 'CHANGEWIDTH', payload: width });
    }

    return (
        <Routes />
    );
}

export default StateWrapper;
