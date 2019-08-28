// @ts-ignore
import {createActions, createReducer} from 'reduxsauce';
import * as SeamlessImmutable from 'seamless-immutable';
import * as R from 'ramda';


// @ts-ignore
const tag = '[MULTISITE_REDUX]';

const functionDefinitions = {
    startup: null,
    requestMultiSiteData: ['siteId'],
    multiSiteDataSuccess: ['multiSiteDataResponse'],
    multiSiteDataFailure: ['multiSiteDataError'],

};


const {Types, Creators} = createActions(functionDefinitions);
export const MultisiteReduxTypes = Types;
export default Creators;

export const MultisiteInitState = {};

export const INITIAL_STATE = SeamlessImmutable(MultisiteInitState);

/*---------- multiSiteData --------*/

export const startup = (state: SeamlessImmutable.Immutable<any>) => {
    const keys = R.keys(state.asMutable()) as string[];
    console.log(tag + '[startup] Redux keys', keys, state);
    const toMerge: any = {};
    for (const key of keys) {
        if (key.endsWith('Error')) {
            toMerge[key] = null;
        }
        if (key.endsWith('Fetching')) {
            toMerge[key] = false;
        }
    }
    console.log(tag + '[startup] Resetting errors and fetching-s : ', toMerge);

    return state.merge(toMerge);
};

export const requestMultiSiteData = (state: SeamlessImmutable.Immutable<any>, action: { siteId: number }) => {
    return state.merge(
        {
            multiSiteDataFetching: true,
            siteId: action.siteId,

        });
};
export const multiSiteDataSuccess = (state: SeamlessImmutable.Immutable<any>, action: {
    multiSiteDataResponse: []
}) => {
    return state.merge(
        {
            multiSiteDataFetching: false,
            multiSiteDataResponse: action.multiSiteDataResponse,

        });
};
export const multiSiteDataFailure = (state: SeamlessImmutable.Immutable<any>, action: { multiSiteDataError: string }) => {
    return state.merge(
        {
            multiSiteDataFetching: false,
            multiSiteDataError: action.multiSiteDataError,

        });
};


export const reducer = createReducer(INITIAL_STATE, {
    [Types.STARTUP]: startup,
    [Types.REQUEST_MULTI_SITE_DATA]: requestMultiSiteData,
    [Types.MULTI_SITE_DATA_SUCCESS]: multiSiteDataSuccess,
    [Types.MULTI_SITE_DATA_FAILURE]: multiSiteDataFailure,

});
