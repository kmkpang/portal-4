import {addLocaleData} from 'react-intl';
import Enlang from './entries/en-US';
import ThLang from './entries/th_TH';
import IsLang from './entries/is_IS';

const AppLocale: { [key: string]: any } = {
    en: Enlang,
    th: ThLang,
    is: IsLang,
};
addLocaleData(AppLocale.en.data);
addLocaleData(AppLocale.th.data);
addLocaleData(AppLocale.is.data);

export default AppLocale;
