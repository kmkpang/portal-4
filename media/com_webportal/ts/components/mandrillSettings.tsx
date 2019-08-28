import * as React from 'react';
import {connect} from 'react-redux';
import {Col, Input, Row, Select} from 'antd';
import * as style from './styles/mandrillSettings.less' ;


const Option = Select.Option;
const children: Array<React.ReactElement<any>> = [];

for (let i = 10; i < 36; i++) {
    children.push(<Option key={i.toString(36) + i}>{i.toString(36) + i}</Option>);
}

class MandrillSettings extends React.Component {

    public handleChange(e: any) {
        console.log(e);
    }

    public handleInputChange(e: any) {
        console.log(e.target.value);
    }

    public handleLanguageChange(value: string[]) {
        console.log(`selected ${value}`);
    }

    public render() {
        return (

            <div className={style.container}>
                <Row> <Col span={4}>
                    <label>Mandrill Api Key</label>
                </Col>
                    <Col span={8}>
                        <Input placeholder={''}
                               onChange={this.handleInputChange}/>
                    </Col>
                </Row>

                <Row>
                    <Col span={4}>
                        Mail From - Email
                    </Col>
                    <Col span={8}>
                        <Input placeholder={''}
                               onChange={this.handleInputChange}/>
                    </Col>
                </Row>

                <Row>
                    <Col span={4}>
                        Mail From - Name
                    </Col>

                    <Col span={8}>
                        <Input placeholder={''}
                               onChange={this.handleInputChange}/>
                    </Col>
                </Row>
                <Row>
                    <Col span={4}>
                        Sub-account
                    </Col>
                    <Col span={8}>
                        <Input placeholder={''}
                               onChange={this.handleInputChange}/>
                    </Col>
                </Row>

                <Row>
                    <Col span={4}>
                        <label>
                            Mail Tags </label>
                    </Col>
                    <Col span={8}>
                        <Select mode='multiple' className={style.select_full} placeholder='Thai Baht (TH)'
                                defaultValue={['xxxx']}
                                onChange={this.handleLanguageChange}>
                            {children}
                        </Select>
                    </Col>
                </Row>
                <Row>
                    <div>
                        <Col span={4}>
                            <label>Google Analytics Domain</label>
                        </Col>
                        <Col span={8}>
                            <Input placeholder={''}
                                   onChange={this.handleInputChange}/>
                        </Col>

                    </div>
                </Row>
            </div>
        );
    }
}

export default connect(null, null)(MandrillSettings);
