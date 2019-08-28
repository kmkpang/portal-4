import * as React from 'react';
import {Table} from 'antd';


const columns = [{
    title: 'ID',
    dataIndex: 'id',
}, {
    title: 'Timestamp',
    dataIndex: 'timestamp',
},
    {
        title: 'Link',
        dataIndex: 'link',
    },
    {
        title: 'Direction',
        dataIndex: 'direction',
    },
    {
        title: 'Type',
        dataIndex: 'type',
    },
    {
        title: 'Command',
        dataIndex: 'command',
    },
    {
        title: 'Details',
        dataIndex: 'details',
    },
    {
        title: 'Resend Xml',
        dataIndex: 'resend xml',
    }];


class WebsendingTable extends React.PureComponent {

    public render() {
        return (
            <div>
                <Table columns={columns} size='middle'/>
            </div>

        );
    }
}

export default WebsendingTable;
