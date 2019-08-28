import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import {store} from '../redux/store';
import {Provider} from 'react-redux';
import * as style from './styles/modWebportalLocationsUi.less';
import {waitForElement} from '../helpers/utilities';
import {LocaleProvider} from 'antd';
import languages from '../language';
import {IntlProvider, intlShape} from 'react-intl';

const tag = '[ModWebportalLocationsUi] ';

declare interface IProperties {
    moduleParams: any;
    context?: any;
}

// tslint:disable-next-line
declare interface IState {
    //
}


class ModWebportalLocationsUi extends React.PureComponent<IProperties, IState> {

  // @ts-ignore
     private static contextTypes = {
         intl: intlShape,
     };
 
     constructor(props: IProperties) {
         super(props);
 
         try {
             //
             console.log(tag + 'Attempting to modify less variables using -> props.moduleParams.less : ', props.moduleParams.less);
         } finally {
             (window as any).less
                 .modifyVars(props.moduleParams.less)
                 .then(() => {
                     console.log(tag + 'Successfully applied theme');
                 })
                 .catch((e: Error) => {
                     console.error(tag + 'Failed to apply theme : ' + e.message);
                 });
         }
     }


    public render() {
        ///const mp = this.props.moduleParams;
        return <div className={style.modWebportalLocationsContainer}>
           xxxxx
        </div>;
    }
}


jQuery(document).ready(() => {
    const id = 'modWebportalLocationsUi';
    waitForElement('#' + id, () => {
            const moduleParams = JSON.parse(atob(jQuery('#' + id).data('hint')));
            console.log(tag + 'Starting ' + id + ' with params :', moduleParams);
            const l: string = moduleParams.language;
            const currentAppLocale = languages[l];
            ReactDOM.render(
                <Provider store={store}>
                    <LocaleProvider locale={currentAppLocale.antd}>
                        <IntlProvider
                            locale={currentAppLocale.locale}
                            messages={currentAppLocale.messages}>
                            <ModWebportalLocationsUi moduleParams={moduleParams}/>
                        </IntlProvider>
                    </LocaleProvider>
    
                </Provider>,
                document.getElementById(id)
            );
        });


});
