// tslint:disable-next-line
import createHistory from 'history/createBrowserHistory';
import {applyMiddleware, combineReducers, compose, createStore} from 'redux';
import {createLogger} from 'redux-logger';
// @ts-ignore
import {autoRehydrate} from 'redux-persist';
import createSagaMiddleware from 'redux-saga';
import thunk from 'redux-thunk';
import ReduxPersist from '../config/ReduxPersist';
import RehydrationServices from '../helpers/RehydrationServices';
import reducers from './reducers';
import rootSaga from './sagas';

/* ------------- Redux Configuration ------------- */

const middleware: any[] = [];
const enhancers: any[] = [];

const history = createHistory();
const sagaMiddleware = createSagaMiddleware();

// if (AppConfig.isDevelopment) {
const logger = createLogger({
    predicate: (getState, action) => action.type !== 'COLLAPSE_OPEN_DRAWER'
});
middleware.push(logger);
// }

middleware.push(thunk);
middleware.push(sagaMiddleware);


/* ------------- Assemble Middleware ------------- */

enhancers.push(applyMiddleware(...middleware));

/* ------------- AutoRehydrate Enhancer ------------- */

// add the autoRehydrate enhancer
if (ReduxPersist.active) {
    enhancers.push(autoRehydrate());
}

const store = createStore(combineReducers({
    ...reducers,
}), compose(...enhancers));

if (ReduxPersist.active) {
    RehydrationServices.updateReducers(store);
}

sagaMiddleware.run(rootSaga);

export {store, history};
