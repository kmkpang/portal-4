// @ts-ignore
import {createActions, createReducer} from 'reduxsauce';
import * as SeamlessImmutable from 'seamless-immutable';
import * as R from 'ramda';


const tag = '[APP_REDUX]';

const functionDefinitions = {
    startup: null,
};

/* ------------- Selectors ------------- */

// call me like this ( instead of userSelectors ) : yield yield select(UserSelector, 'accountData')
export const AppStateSeletor = (state: any, variable: string) => state.app[variable];


const {Types, Creators} = createActions(functionDefinitions);
export const AppReduxTypes = Types;
export default Creators;

export const AppInitState = {};

export const INITIAL_STATE = SeamlessImmutable(AppInitState);


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


export const reducer = createReducer(INITIAL_STATE, {
    [Types.STARTUP]: startup,
});
