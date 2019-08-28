import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import {store} from '../redux/store';
import {Provider} from 'react-redux';
import {Card, Col, Row, Input, Select, Icon, Checkbox} from 'antd';
import * as style from '../containers/styles/websendingUI.less';
import WebsendingTable from './websendingTable';

const Search = Input.Search;


class WebsendingUi extends React.PureComponent {

    public render() {
        return <Card title={'Websending'} bordered={false} bodyStyle={{padding: 0}}>

            <div className={style.container}>
                <Row>
                    <Col span={8} className={style.websending}>
                        <Input placeholder='Property unique id'/>
                    </Col>

                    <Col span={8} className={style.websending}>
                        <Input placeholder='Agent unique id'/>
                    </Col>

                    <Col span={8} className={style.websending}>
                        <Select className={style.select_full} placeholder='Office unique id'>
                            <Select.Option value={'select'}>select</Select.Option>
                        </Select>
                    </Col>
                </Row>


                <Row>
                    <Col span={8} className={style.websending}>
                        <Select className={style.select_full} placeholder='Direction'>
                            <Select.Option value={'Direction'}>Direction</Select.Option>
                            <Select.Option value={'Incoming'}>Incoming (SAGA <Icon
                                type='arrow-right'/> Potal)</Select.Option>
                            <Select.Option value={'Outgoing'}>Outgoing (Portal <Icon
                                type='arrow-right'/> SAGA)</Select.Option>
                        </Select>
                    </Col>

                    <Col span={8} className={style.websending}>
                        <Select className={style.select_full} placeholder='Command'>
                            <Select.Option value={'Create'}>Create</Select.Option>
                            <Select.Option value={'Update'}>Update</Select.Option>
                            <Select.Option value={'Dalete'}>Dalete</Select.Option>
                        </Select>
                    </Col>
                    <Col span={8} className={style.websending}>
                        <Select className={style.select_full} placeholder='Type'>
                            <Select.Option value={'Office'}>Office</Select.Option>
                            <Select.Option value={'Agent'}>Agent</Select.Option>
                            <Select.Option value={'Property'}>Property</Select.Option>
                        </Select>
                    </Col>
                    <Col span={8} className={style.websending}>

                    </Col>
                    <Col span={8} className={style.websending}>
                        <Checkbox>
                            Show Command/Response</Checkbox>
                    </Col>
                    <Col span={8} className={style.websending}>
                        <Search
                            placeholder='Search Text'
                            onSearch={value => console.log(value)}
                            style={{paddingTop: 7}}
                        />
                    </Col>

                </Row>

            </div>

            <WebsendingTable></WebsendingTable>
        </Card>;
    }
}


jQuery(document).ready(() => {
    jQuery('#isisJsData').remove();
    ReactDOM.render(
        <Provider store={store}>
            <WebsendingUi/>
        </Provider>,
        document.getElementById('websendingUi')
    );
});
