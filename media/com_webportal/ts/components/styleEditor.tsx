import * as React from 'react';
import {connect} from 'react-redux';
import {createSelector} from 'reselect';
import AceEditor from 'react-ace';

import 'brace/mode/less';
import 'brace/theme/twilight';
import {Card} from 'antd';


declare interface IProperty {
    dummyValue?: string;
}

class StyleEditor extends React.PureComponent<IProperty> {

    public render() {

        // @ts-ignore
        return <Card title={'Override Less Variables'} bordered={false} bodyStyle={{padding: 0}}>
            <AceEditor placeholder='Enter Less Code Override Here'
                       mode='less'
                       theme='twilight'
                       name='blah2'
                       width={'100%'}
                       onChange={this.onChange}
                       fontSize={14}
                       showPrintMargin={false}
                       showGutter={true}
                       highlightActiveLine={true}
                       value={``}
                       setOptions={{
                           enableBasicAutocompletion: false,
                           enableLiveAutocompletion: false,
                           enableSnippets: false,
                           showLineNumbers: true,
                           tabSize: 2,
                       }}/>
        </Card>;

    }

    private onChange(value: string) {
        console.log('->', value);
    }
}


const mapFnc = createSelector(
    [],
    () => {
        return {};
    }
);

// @ts-ignore
const mapStateToProps = state => {
    return mapFnc(state);
};

// @ts-ignore
const mapDispatchToProps = dispatch => {
    return {};
};

export default connect(mapStateToProps, mapDispatchToProps)(StyleEditor);
