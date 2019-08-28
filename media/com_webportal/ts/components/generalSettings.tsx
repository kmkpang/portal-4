import * as React from 'react';
import {connect} from 'react-redux';
import {Col, Input, Row,  Select} from 'antd';
import * as style from './styles/generalSettingsStyle.less';
// tslint:disable-next-line
// import * as moment from 'moment';

const Option = Select.Option;
function handleLanguageChange(value: string[]) {
    console.log(`selected ${value}`);
}
function handleGantryStyleChange(value: string[]) {
    console.log(`selected ${value}`);
}
// const dateFormat = 'DD-MM-YYYY';
const children: Array<React.ReactElement<any>> = [];
for (let i = 10; i < 36; i++) {
    children.push(<Option key={i.toString(36) + i}>{i.toString(36) + i}</Option>);
}
const generalSettings = () => {
    return <div className={style.generalSettingsContainer}>
        <div className={style.container}>
            <Row>
                <Col span={4}>
                    <label> Site name</label>
                </Col>
                <Col span={8}>
                    <Input placeholder=''/>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label> Country Code</label>
                </Col>
                <Col span={8}>
                    <Select className={style.select_full} onChange={handleLanguageChange}>
                        <Option value='ENG'>ENG</Option>
                    </Select>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label> Gantry Style</label>
                </Col>
                <Col span={8}>
                    <Select className={style.select_full} onChange={handleGantryStyleChange}>
                        <Option value='Softverk'>Softverk</Option>
                    </Select>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label> Languages </label>
                </Col>
                <Col span={8}>
                    <Select mode='multiple' className={style.select_full} placeholder='English (en_GB)'
                            onChange={handleLanguageChange}>
                        {children}
                    </Select>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label> Currencies </label>
                </Col>
                <Col span={8}>
                    <Select mode='multiple' className={style.select_full} placeholder='Thai Baht (TH)'
                            defaultValue={['xxxx']}
                            onChange={handleLanguageChange}>
                        {children}
                    </Select>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label> Date Format Short </label>
                </Col>
                <Col span={8}>
                    <Select className={style.select_full} onChange={handleGantryStyleChange}>
                        <Option value='s1'>d/m/yy</Option>
                        <Option value='s2'>d/MM/yy</Option>
                        <Option value='s3'>M/d/yy</Option>
                        <Option value='s4'>MM/dd/yy</Option>
                        <Option value='s5'>MM/dd/yy</Option>
                        <Option value='s6'>yyyy-MM-dd</Option>
                    </Select>
                </Col>
            </Row>
            <Row>
                <Col span={4}>
                    <label> Date Format Long </label>
                </Col>
                <Col span={8}>
                    <Select className={style.select_full} onChange={handleGantryStyleChange}>
                        <Option value='L1'>dd/mm/yyyy</Option>
                        <Option value='L2'>dd/MM/yyyy</Option>
                        <Option value='L3'>DD/MM/YYYY</Option>

                    </Select>
                </Col>
            </Row>
        </div>
    </div>;
};
const GeneralSettings = connect(
    state => ({})
)(generalSettings);
export default GeneralSettings;