import * as localForage from 'localforage';
import immutablePersistenceTransform from '../helpers/ImmutablePersistenceTransform';

const REDUX_PERSIST = {
    active: true,
    reducerVersion: '4.0.0',// bump me in order to clean the stored data
    storeConfig: {
        storage: localForage,
        blacklist: ['volatile'], // reducer keys that you do NOT want stored to persistence here
        transforms: [immutablePersistenceTransform]
    }
};

export default REDUX_PERSIST;
