const _apiHost = 'http://localhost/api/';

async function request(url, params, method = 'GET') {

    const options = {
        method,
        headers: {
            // 'Access-Control-Allow-Origin': '*',
            // 'Accept': 'application/json',
            // 'Content-Type': 'application/json',
            // 'Oidc-Claim-Email': 'mirel@talisman.tech'
        }
    };

    if (params) {
        if (method === 'GET') {
            url += '?' + objectToQueryString(params);
        } else {
            options.body = JSON.stringify(params);
        }
    }

    const response = await fetch(_apiHost + url, options);

    if (response.status !== 200) {
        return generateErrorResponse('The server responded with an unexpected status.');
    }

    const result = await response.json();
    result.isError = false;

    if (!Array.isArray(result.data) && !Object.keys(result.data).length) {
        result.isError = true;
    }

    if (Array.isArray(result.data) && !result.data.length) {
        result.isError = true;
    }

    return result;

}

function objectToQueryString(obj) {
    return Object.keys(obj).map(key => key + '=' + obj[key]).join('&');
}

function generateErrorResponse(message) {
    return {
        status: 'error',
        message
    };
}

const get = (url, params) => {
    return request(url, params);
}

const create = (url, params) => {
    return request(url, params, 'POST');
}

const update = (url, params) => {
    return request(url, params, 'PUT');
}

const remove = (url, params) => {
    return request(url, params, 'DELETE');
}

export default {
    get,
    create,
    update,
    remove
};