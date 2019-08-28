import * as React from 'react';
import {connect} from 'react-redux';
import {createSelector} from 'reselect';
import {Table, Tag} from 'antd';

declare interface ISite {
    key: number;
    siteName: string;
    urls: string[];
}

declare interface IProperty {
    siteList: ISite[];
}

class MultisiteList extends React.PureComponent<IProperty> {


    public render() {

        const columns = [
            {
                title: 'Id',
                dataIndex: 'key',
                key: 'key'
            },
            {
                title: 'Site Name',
                dataIndex: 'siteName',
                key: 'siteName'
            },
            {
                title: 'Urls',
                dataIndex: 'urls',
                key: 'urls',
                render: (urls: string[]) => {
                    return <span>
                        {urls.map((url) => {
                            return (
                                <Tag key={url}>
                                    {url}
                                </Tag>
                            );
                        })}
                      </span>;
                },
            },
            {
                title: 'Action',
                key: 'action',
                render: (aRow: ISite) => {
                    return <span>
                        <a href={(window as any).uriBase + 'index.php?option=com_webportal&view=multisite&id=' + aRow.key}>{`Edit ${aRow.siteName}`}</a>
                    </span>;
                },
            },
        ];

        return <Table columns={columns} dataSource={this.props.siteList}/>;
    }
}


const siteListFnc = (state: any) => {
    return [
        {
            key: 0,
            siteName: 'Softverk',
            urls: [
                'sales.softverk.co.th',
                'sales.softverk.is',
                'sales.softverk.ph'
            ]
        },
        {
            key: 1,
            siteName: 'IHouse Bangkok',
            urls: [
                'ihouse.softverk.co.th',
                'ihouse.co.th'
            ]
        }
    ] as ISite[];
};

const mapFnc = createSelector(
    [siteListFnc],
    (siteList) => {
        return {siteList};
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

export default connect(mapStateToProps, mapDispatchToProps)(MultisiteList);
