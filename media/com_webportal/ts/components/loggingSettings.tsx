import * as React from 'react';
import {Col, Input, Row, Select} from 'antd';
import * as style from './styles/loggingSetting.less';


class LoggingSettings extends React.Component {

    public handleChange(e: any) {
        console.log(e);
    }

    public handleInputChange(e: any) {
        console.log(e.target.value);
    }

    public render() {
        return (

            <div className={style.container}>
                <Row> <Col span={4}>
                    <label>Log File</label>
                </Col>
                    <Col span={8}>
                        <Input placeholder={''}
                               onChange={this.handleInputChange}/>
                    </Col>
                </Row>


                <Row>
                    <Col span={4}>Log Level</Col>
                    <Col span={8}>
                        <Select className={style.select_full}>
                            <Select.Option value={'xx'}>select</Select.Option>
                        </Select>
                    </Col>
                </Row>


            </div>
        );
    }
}

export default LoggingSettings;
