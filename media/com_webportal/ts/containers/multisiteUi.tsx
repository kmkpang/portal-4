import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import {store} from '../redux/store';
import {connect, Provider} from 'react-redux';
import {Button, Card, Col, Icon, Row, Tabs} from 'antd';
import {FaCss3Alt} from 'react-icons/fa';
import StyleEditor from '../components/styleEditor';
import {getUrlParameter} from '../helpers/utilities';
import {createSelector} from 'reselect';
import Actions from '../redux/multisite/multisiteRedux';

const TabPane = Tabs.TabPane;

class MultisiteUi extends React.PureComponent<{
    requestMultiSiteData?: (siteId: number) => void
}, { fetching: boolean }> {

    public componentDidMount() {
        const siteIdString = getUrlParameter('id');
        if(siteIdString && this.props.requestMultiSiteData) {
            const siteId = parseInt(siteIdString, 10);
            this.props.requestMultiSiteData(siteId);
        }
    }

    public render() {
        return <Card title={'Editing Single Site'} bordered={false} bodyStyle={{padding: 5}}>
            <Row>
                <Col span={24}>
                    <Tabs defaultActiveKey='generalSettings'
                          tabPosition={'left'} tabBarStyle={{padding: 0}}>
                        <TabPane tab={<span><Icon type='setting'/>General</span>} key='generalSettings'>

                        </TabPane>


                        <TabPane tab={<span><FaCss3Alt/>Style</span>} key='styleSettings'>
                            <StyleEditor/>
                        </TabPane>


                    </Tabs>
                </Col>
            </Row>
            <Row>
                <Col offset={22} span={2}>
                    <Button type='primary' icon='save'>Save</Button>
                </Col>
            </Row>

        </Card>;
    }
}

const mapFnc = createSelector(
    [],
    () => {
        return {

        };
    }
);

const mapStateToProps = (state:any) => {
    return mapFnc(state);
};

const mapDispatchToProps = (dispatch:any) => {
    return {
        requestMultiSiteData: (siteId: number) => dispatch(Actions.requestMultiSiteData(siteId))
    };
};

const MultisiteUiConnected = connect(
    mapStateToProps,
    mapDispatchToProps
)(MultisiteUi);


jQuery(document).ready(() => {
    jQuery('#isisJsData').remove();
    ReactDOM.render(
        <Provider store={store}>
            <MultisiteUiConnected/>
        </Provider>,
        document.getElementById('multisiteUi')
    );
});
