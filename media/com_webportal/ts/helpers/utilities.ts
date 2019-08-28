import * as jQuery from '../../../jui/js/jquery';
import {ApiResponse} from 'apisauce';


export function waitForElement(selector: string, callback: (elements: HTMLElement[] ) => void, count?: number) {

    const maxLoop = 75;
    const waitTime = 250;

    if (jQuery(selector).length) {
        callback(jQuery(selector));
    } else {
        setTimeout(() => {
            if (!count) {
                count = 0;
            }
            count++;
            console.log('[waitForElement] Element ', selector, ' not found yet : ', count);
            if (count < maxLoop) {
                waitForElement(selector, callback, count);
            } else {
                return;
            }
        }, waitTime);
    }
}


export function getUrlParameter(param: string): string | null {
    const url = new URL(window.location.href);
    return url.searchParams.get(param);
}


export function validateOrThrowApiResponse(responseObj?: ApiResponse<JSON>): JSON {
    const isInvalid =
        !responseObj ||
        (responseObj.status && (responseObj.status < 200 || responseObj.status > 299)) || // check response status code
        !responseObj.ok ||
        (responseObj.data && ((responseObj.data as any) as any).error);
    if (isInvalid && responseObj) {
        console.warn('[API_VALIDATION][failure][', responseObj.status, '] (responseObj.data as any) -> ', (responseObj.data as any));
        let errorMessage = responseObj.problem;
        if (responseObj.data && (responseObj.data as any).message) {
            errorMessage = (responseObj.data as any).message;
        }
        if (responseObj.data && (responseObj.data as any).error && (responseObj.data as any).error.message) {
            errorMessage = (responseObj.data as any).error.message;
        }
        if (!errorMessage) {
            errorMessage = 'UNKNOWN_ERROR';
        }
        throw Error(errorMessage);
    }

    if (responseObj) {
        console.log('[API_VALIDATION][success] > ', responseObj.data);
    }

    // @ts-ignore
    return responseObj && responseObj.data;
}
