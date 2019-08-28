//// NOTE: only purpose of keeping this around is to have a refrence. this file is NOT to be modified and to be deleted eventually.
import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import {store} from '../redux/store';
import {Provider} from 'react-redux';
import * as style from './styles/propertiesSearch.less';
import {waitForElement} from '../helpers/utilities';
import languages from '../language';
import {LocaleProvider} from 'antd';
import {IntlProvider, intlShape} from 'react-intl';

const tag = '[PropertiesSearchUi] '

declare interface IProperties {
    moduleParams: any;
    context?: any;
}

// tslint:disable-next-line
declare interface IState {
    //
}


class ModWebportalPropertiesUi extends React.PureComponent<IProperties, IState> {

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
        return <div className={style.modWebportalPropertiesContainer}>
        </div>;
    }
}


jQuery(document).ready(() => {
    const id = 'modWebportalPropertiesUi';
    const selector = '*[data-type="' + id + '"]';
    waitForElement(selector, (elements: HTMLElement[]) => {
        console.log(tag + ' obtained modWebportalPropertiesUi divs : ', elements);
        for (const element of elements) {
            const moduleParams = JSON.parse(atob(jQuery('#' + element.id).data('hint')));
            console.log(tag + 'Starting ' + element.id + ' with params :', moduleParams);
            const l: string = moduleParams.language;
            const currentAppLocale = languages[l];
            ReactDOM.render(
                <Provider store={store}>
                    <LocaleProvider locale={currentAppLocale.antd}>
                        <IntlProvider
                            locale={currentAppLocale.locale}
                            messages={currentAppLocale.messages}>
                            <ModWebportalPropertiesUi moduleParams={moduleParams}/>
                        </IntlProvider>
                    </LocaleProvider>

                </Provider>,
                document.getElementById(element.id)
            );
        }
    });


});
