import React, { useEffect, useContext } from 'react';
import { store } from './store';
import http from './utils/http';
/**
 * Protected component for auth
 *
 * @param WrappedComponent
 *
 * @returns {*}
 *
 * @constructor
 */
const Protected = ({ WrappedComponent }) => {
    const globalState = useContext(store);
    const { dispatch } = globalState;

    useEffect(() => {
        _getUser();
    }, []);

    const _getUser = async () => {
        let res = await http.get('user/1');
        if(!res.isError) {
            dispatch({ type: 'SETUSER', payload: res.data });
        }
    }

    if (Object.entries(globalState.state.user).length === 0 && globalState.state.user.constructor === Object) {
        return <p>not logged innnn</p>;
    }

    return <WrappedComponent />;

};

export default Protected;