import antdSA from 'antd/lib/locale-provider/is_IS';
import * as appLocaleData  from  'react-intl/locale-data/is';
import saMessages from '../locales/is_IS';

const saLang = {
    messages: {
        ...saMessages
    },
    antd: antdSA,
    locale: 'is-IS',
    data: appLocaleData
};
export default saLang;
