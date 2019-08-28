import {all} from 'redux-saga/effects';
import appSagas from './app/appSaga';
import multisiteSagas from './multisite/multisiteSaga';

import p4Api from '../services/PortalV4Api';

export const P4Api = p4Api.create();

export default function* rootSaga() {
    yield all([
        appSagas(),
        multisiteSagas(),
    ]);
}
