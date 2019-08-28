import * as React from 'react';
import {connect} from 'react-redux';
import {Col, Input, InputNumber, Row} from 'antd';
import * as style from './styles/googleSettingsStyle.less';

/*
 * Create a functional component
 * */
function onChange(value: number | string | undefined) {
    console.log('changed', value);
}


const googleSettings = () => {
    return <div className={style.googleSettingsContainer}>

        <div className={style.container}>
            <Row>
                <Col span={4}>
                    <label> Gmap Api Key</label>
                </Col>
                <Col span={8}>
                    <Input placeholder=''/>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label>Gmap places Key</label>
                </Col>
                <Col span={8}>
                    <Input placeholder=''/>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label>Google Search Key</label>
                </Col>
                <Col span={8}>
                    <Input placeholder=''/>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label> Gmap Default Lat Lng</label>
                </Col>
                <Col span={8}>
                    <Input placeholder=''/>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label>Gmap Default Zoom</label>
                </Col>
                <Col span={8}>

                    <InputNumber className={style.select_full} min={1} max={20} defaultValue={1} onChange={onChange} />

                </Col>
            </Row>

        </div>


    </div>;
};


const GoogleSettings = connect(
    state => ({})
)(googleSettings);

export default GoogleSettings;
