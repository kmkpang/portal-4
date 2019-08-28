import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import {store} from '../redux/store';
import {Provider} from 'react-redux';
import {Card} from 'antd';
import MultisiteList from '../components/multisiteList';

class MultisitesUi extends React.PureComponent {


    public render() {

        return <Card title={'Multi-Site Settings'} bordered={false} bodyStyle={{padding: 0}}>
            <MultisiteList/>
        </Card>;
    }
}


jQuery(document).ready(() => {
    jQuery('#isisJsData').remove();
    ReactDOM.render(
        <Provider store={store}>
            <MultisitesUi/>
        </Provider>,
        document.getElementById('multisitesUi')
    );
});
