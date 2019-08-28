import * as React from 'react';
import {connect} from 'react-redux';
import {Col, Input, Row} from 'antd';
import * as style from './styles/cloudinarySettingsStyle.less';
/*
 * Create a functional component
 * */
const cloudinarySettings = () => {
    return <div className={style.cloudinarySettingsContainer}>

        <div className={style.container}>
            <Row>
                <Col span={4}>
                    <label> Cloud Name</label>
                </Col>
                <Col span={8}>
                    <Input placeholder=''/>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label>Api Key</label>
                </Col>
                <Col span={8}>
                    <Input placeholder=''/>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label>Api Secret</label>
                </Col>
                <Col span={8}>
                    <Input placeholder=''/>
                </Col>
            </Row>


        </div>



    </div>;
};

const CloudinarySettings = connect(
    state => ({})
)(cloudinarySettings);

export default CloudinarySettings;
