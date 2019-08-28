
export default {
    app: require('./app/appRedux').reducer,
    volatile:require('./volatile/volatileRedux').reducer,
    multisite:require('./multisite/multisiteRedux').reducer
};
