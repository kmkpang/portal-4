import {effects} from 'redux-saga';
import VolatileActions, {VolatileStateSelector, VolatileTypes} from '../volatile/volatileRedux';
import {AppReduxTypes} from './appRedux';
import {select, take} from 'redux-saga/effects';


export function* startup() {
    const tag = '[STARTUP]';
    try {
        // do shit....

        // yield delay(5000);
        yield effects.put(VolatileActions.startupComplete());

    } catch (e) {
        console.warn(`${tag} Failed to startup : ${e.message}`);
    }


}

export function * waitForStartupComplete(){
    const tag = '[WAIT_4_STARTUP_COMPLETE] ';
    const startupComplete = yield select(VolatileStateSelector,'startupComplete');
    if(!startupComplete){
        console.log(tag + 'Startup not complete yet, going to wait..');
        yield take(VolatileTypes.STARTUP_COMPLETE);
        console.log(tag + 'Startup complete, returning..');
    }
}

export default function* rootSaga() {
    yield effects.all([effects.takeLatest(AppReduxTypes.STARTUP, startup)]);
}
