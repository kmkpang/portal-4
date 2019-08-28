import * as localForage from 'localforage';
// @ts-ignore
import {persistStore} from 'redux-persist';
import ReduxPersist from '../config/ReduxPersist';
import AppRedux from '../redux/app/appRedux';

const tag = '[REHYDRATION_SERVICE]';
const updateReducers = (store:any) => {
    const reducerVersion = ReduxPersist.reducerVersion;
    const config = ReduxPersist.storeConfig;
    const startup = () => store.dispatch(AppRedux.startup());

    localForage.getItem('reducerVersion').then((localVersion) => {
        if (localVersion !== reducerVersion) {
            // Purge store
            console.warn(`${tag} Local version ${localVersion} did NOT match reducer version ${reducerVersion} , attempting to purge`);
            persistStore(store, config, startup).purge();
            console.log(`${tag} Setting reducer version to : ${reducerVersion}`);
            localForage.setItem('reducerVersion', reducerVersion);
        } else {
            console.log(`${tag} Starting to persist store using version : ${reducerVersion}`);
            persistStore(store, config, startup);
        }
    }).catch((e) => {
        console.error(`${tag} Failed to get reducer version : ${e.message}`);
        console.log(`${tag} Starting to persist store using version : ${reducerVersion}`);
        persistStore(store, config, startup);

        localForage.setItem('reducerVersion', reducerVersion);
    });

};

export default {updateReducers};
