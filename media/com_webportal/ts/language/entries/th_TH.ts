import antdSA from 'antd/lib/locale-provider/th_TH';
import * as appLocaleData  from  'react-intl/locale-data/th';
import saMessages from '../locales/th_TH';

const saLang = {
    messages: {
        ...saMessages
    },
    antd: antdSA,
    locale: 'th-TH',
    data: appLocaleData
};
export default saLang;
