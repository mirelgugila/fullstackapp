// store.js
import React, { createContext, useReducer } from 'react';

const initialState = {
    user: {},
    width: '',
    isLoading: true
};

const store = createContext(initialState);
const { Provider } = store;

const StateProvider = ({ children }) => {
    const [state, dispatch] = useReducer((state, action) => {
        switch (action.type) {
            case 'CHANGEWIDTH':
                return { ...state, width: action.payload }
            case 'SETUSER':
                return { ...state, user: action.payload }
            case 'TOGGLELOADING': 
                return {...state, isLoading: action.payload}
            default:
                throw new Error();
        };
    }, initialState);

    return <Provider value={{ state, dispatch }}>{children}</Provider>;
};

export { store, StateProvider }