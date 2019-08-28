import apisauce, {ApiResponse} from 'apisauce';

const DEFAULT_TIMEOUT = 20000;

const tag = '[PORTAL_V4_API] ';
const create = () => {

    const baseURL = (window as any).uriRoot;

    console.log(tag + ' Creating api with baseURL', baseURL);
    const api = apisauce.create({
        baseURL,
        headers: {
            'Cache-Control': 'no-cache'
        },
        // 60 second timeout...
        timeout: DEFAULT_TIMEOUT
    });

    const executeRESTApiCall = (path: string, type: 'GET' | 'POST' | 'PUT' | 'DELETE', body?: JSON, timeout?: number): Promise<ApiResponse<JSON>> => {
        // default timeout
        const defaultTimeout = timeout || DEFAULT_TIMEOUT;

        const api2Use = timeout ? api : apisauce.create({
            baseURL,
            headers: {
                'Cache-Control': 'no-cache'
            },
            timeout: defaultTimeout
        });


        if (type === 'POST') {
            console.log(tag + 'Posting : ', path, 'with : ', body);
            return api2Use.post(path, body);
        } else if (type === 'PUT') {
            console.log(tag + 'Putting : ', path);
            return api2Use.put(path, body);
        } else if (type === 'DELETE') {
            console.log(tag + 'Deleting : ', path);
            return api2Use.delete(path, body);
        } else {
            console.log(tag + 'Getting : ', path);
            return api2Use.get(path);
        }
    };


    return {
        executeRESTApiCall
    };
};

export default {
    create
};
