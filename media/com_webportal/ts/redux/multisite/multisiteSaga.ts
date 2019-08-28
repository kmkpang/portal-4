import {effects} from 'redux-saga';
import Actions, {MultisiteReduxTypes as ReduxTypes} from './multisiteRedux';
import {call, put} from 'redux-saga/effects';
import {waitForStartupComplete} from '../app/appSaga';
import {P4Api} from '../sagas';
import {validateOrThrowApiResponse} from '../../helpers/utilities';

export function* requestMultiSiteData(action: { siteId: number }) {
    const tag = '[REQUEST_MULTI_SITE_DATA]';
    try {
        yield waitForStartupComplete();

        // step 1: perform input validation
        const inputValid = action && typeof action.siteId === 'number'; // IDE-Help, do not delete me
        if (inputValid) {
            // step 2 : validation passed..
            const response = yield call(P4Api.executeRESTApiCall, 'api/v1/multisite', 'GET');
            const result = validateOrThrowApiResponse(response);
            yield put(Actions.multiSiteDataSuccess(result));

        } else {
            throw new Error('xx.yyInvalidInput'); // <-- fix me
        }
    }
    catch (e) {
        console.warn(`${tag} requestMultiSiteData failed with error :`, e);
        const message = e.message ? e.message : 'Failed';
        yield put(Actions.multiSiteDataFailure(message));
    }
}

export default function* rootSaga() {
    yield effects.all([effects.takeLatest(ReduxTypes.REQUEST_MULTI_SITE_DATA, requestMultiSiteData),]);
}
