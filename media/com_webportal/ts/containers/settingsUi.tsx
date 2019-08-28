import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import {store} from '../redux/store';
import {Provider} from 'react-redux';
import {Button, Card, Col, Icon, Row, Tabs} from 'antd';
import GeneralSettings from '../components/generalSettings';
import GoogleSettings from '../components/googleSettings';
import MandrillSettings from '../components/mandrillSettings';
import LoggingSettings from '../components/loggingSettings';
import CloudinarySettings from '../components/cloudinarySettings';
// @ts-ignore
import * as styles from '../styles/index.less';

const TabPane = Tabs.TabPane;

class SettingsUi extends React.PureComponent {

    public render() {
        return <Card  className={styles.container} title={'Webportal Settings'} bordered={false} bodyStyle={{padding: 0}}>
            <Row>
                <Col span={24}>
                    <Tabs defaultActiveKey='generalSettings'
                          tabPosition={'left'} tabBarStyle={{padding: 0}}>
                        <TabPane tab={<span><Icon type='setting'/>General</span>} key='generalSettings'>
                            <GeneralSettings/>
                        </TabPane>


                        <TabPane tab={<span><Icon type='cloud'/>Cloudinary</span>} key='cloudinarySettings'>
                            <CloudinarySettings/>
                        </TabPane>


                        <TabPane tab={<span><Icon type='google'/>Google</span>} key='googleApiSettings'>
                            <GoogleSettings/>
                        </TabPane>


                        <TabPane tab={<span><Icon type='align-left'/>Mandrill</span>} key='MandrillSettings'>
                            <MandrillSettings/>
                        </TabPane>


                        <TabPane tab={<span><Icon type='align-left'/>Logging</span>} key='loggingSettings'>
                            <LoggingSettings/>
                        </TabPane>


                    </Tabs>
                </Col>
            </Row>
            <Row>
                <Col offset={12} span={4}>
                    <Button type='primary' icon='save'>Save</Button>
                </Col>
            </Row>


        </Card>;
    }
}


jQuery(document).ready(() => {
    jQuery('#isisJsData').remove();
    ReactDOM.render(
        <Provider store={store}>
            <SettingsUi/>
        </Provider>,
        document.getElementById('settingsUi')
    );
});
