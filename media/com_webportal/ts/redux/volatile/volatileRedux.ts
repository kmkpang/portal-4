// @ts-ignore
import {createActions, createReducer} from 'reduxsauce';
import * as SeamlessImmutable from 'seamless-immutable';
import {Immutable} from 'seamless-immutable';

/* ------------- Types and Action Creators ------------- */

const functionDefinitions = {
    startupComplete: null,
    loginComplete: null
};

const {Types, Creators} = createActions(functionDefinitions);

export const VolatileTypes = Types;
export default Creators;

// call me like this ( instead of userSelectors ) : yield yield select(UserSelector, 'accountData')
export const VolatileStateSelector = (state: any, variable: string) => state.app[variable]


/* ------------- Initial State ------------- */

export const VolatileInitState = {
    startupComplete: false,
    loginComplete: false
};

export const INITIAL_STATE = SeamlessImmutable(VolatileInitState);

/* ------------- Reducers ------------- */

export const startupComplete = (state: Immutable<typeof VolatileInitState>) => {
    return state.merge({startupComplete: true});
};

export const loginComplete = (state: Immutable<typeof VolatileInitState>) => {
    return state.merge({loginComplete: true});
};

/* ------------- Hookup Reducers To Types ------------- */

export const reducer = createReducer(INITIAL_STATE, {
    [Types.STARTUP_COMPLETE]: startupComplete,
    [Types.LOGIN_COMPLETE]: loginComplete
});
