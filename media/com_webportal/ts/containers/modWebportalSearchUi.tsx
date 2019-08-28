import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import {store} from '../redux/store';
import {Provider} from 'react-redux';
import * as style from './styles/modWebportalSearchUi.less';
import {waitForElement} from '../helpers/utilities';
import {Col, Input, LocaleProvider, Row, Button, Icon, Slider, Select, Tag, Tooltip, Carousel} from 'antd';
import languages from '../language';
import {IntlProvider, intlShape} from 'react-intl';
// import { isBrowser, isTablet, isMobileOnly } from 'react-device-detect';
const {Option,OptGroup} = Select;

const provinceData = require('../json/province.json');
// const districtData = require('../json/district.json');

const tag = '[ModWebportalSearchUi] ';

declare interface IProperties {
    moduleParams: any;
    context?: any;
}

// tslint:disable-next-line
declare interface IState {
    //
}

class ModWebportalSearchUi extends React.PureComponent<IProperties, IState> {

    // @ts-ignore
    private static contextTypes = {
        intl: intlShape,
    };

    public state = {
        isMobile: false,
        isTablet: false,
        isBrowser: false,
        isOpen : false,
        isOpenPrice: false,
        isOpenRoom: false,
        isOpenProvice: false,
        isOpenTags: false,
        isShowMapSearch: true,
        search: '',
        menu : null,
        startMin : 0,
        startMax : 100000000,
        propertyGroupType : 'residential',
        propertyType : null,
        buyRentType : null,
        room : 0,
        bath : 0,
        min : 0,
        max: 0,
        tags: [],
    };

    constructor(props: IProperties) {
        super(props);

        try {
            console.log(tag + 'Attempting to modify less variables using -> props.moduleParams.less : ', props.moduleParams.less);
        } finally {
            (window as any).less
                .modifyVars(props.moduleParams.less)
                .then(() => {
                    console.log(tag + 'Successfully applied theme');
                })
                .catch((e: Error) => {
                    console.error(tag + 'Failed to apply theme : ' + e.message);
                });
        }
    }

    public handleOpenAdvanceSearch = () => {
        if(this.state.isOpen){
            this.setState({
                isOpen : false,
                isOpenPrice: false,
                isOpenRoom: false,
                isOpenProvice : false,
            });
        } else {
            this.setState({
                isOpen : true,
            });
        }
    }

    public handleOpenPriceSearch = () => {
        if(this.state.isOpenPrice){
            this.setState({
                isOpenPrice: false,
                isShowMapSearch : true
            });
        } else {
            this.setState({
                isOpenPrice : true,
                isOpenRoom: false,
                isOpenProvice : false,
                isShowMapSearch : false
            });
        }
    }

    public handleOpenProvinceSearch = () => {
        if(this.state.isOpenProvice){
            this.setState({
                isOpenProvice: false,
                isShowMapSearch : true
            });
        } else {
            this.setState({
                isOpenProvice : true,
                isOpenPrice : false,
                isOpenRoom: false,
                isShowMapSearch : false,
            });
        }
    }

    public handleOpenRoomSearch = () => {
        if(this.state.isOpenRoom){
            this.setState({
                isOpenRoom: false,
                isShowMapSearch : true
            });
        } else {
            this.setState({
                isOpenRoom : true,
                isOpenPrice: false,
                isOpenProvice : false,
                isShowMapSearch : false,
            });
        }
    }

    public handleSelectPropertyTypeChange = (e: any) => {
        let propertyGroupType = null;
        switch(e) {
            case 'officeSpace':
            case 'commercialBuilding':
                propertyGroupType = 'commercial';
                break;
            default : 
                propertyGroupType = 'residential';
                break;
        }
        this.setState({propertyGroupType, propertyType : e});
    }

    public handleSelectBuyRentTypeChange = (e: any) => {
        let startMax = 0;
        const mp = this.props.moduleParams; 
        switch(e) {
            case 'rent':
                startMax = mp.property_price.property_price_rent_max;
                break;
            case 'buy':
                startMax = mp.property_price.property_price_buy_max;
                break;
            default : 
                startMax = mp.property_price.property_price_buy_max;
                break;
        }
        this.setState({startMax, buyRentType : e});
    }

    public convertPrice = (value: any) => {
        if(value>=1000000) {
            return `${(value/1000000)}M`;
        } else if(value>=1000) {
            return `${(value/1000)}K`;
        } else {
            return `${value}`;
        }
    }

    public handlePriceChange = (value: any) => {
        const min = Number(value[0]);
        const max = Number(value[1]);
        const price = `${this.convertPrice(min)} - ${this.convertPrice(max)}`;
        this.handleCreateTag('Price', price);
        this.setState({min,  max});
    }

    public handleAmountRoom  = async (type: any, action: any) => {
        let room = this.state.room;
        let bath = this.state.bath;
        const header = this.state.propertyGroupType === 'residential' ? 'Beds' : 'Rooms';
        const value = this.state.propertyGroupType === 'residential' ? 'beds' : 'rooms';
        const cleanHeader = this.state.propertyGroupType === 'residential' ? 'Rooms' : 'Beds';

        if(type === 'room') {
            room < 10 ? (room = action === 'minus' ? room - 1 : room + 1) : room = room;
            this.handleDeleteTag(cleanHeader, null);
            room > 0 ? this.handleCreateTag(header, `${room} ${value}`) : this.handleDeleteTag(header, null);
        } else if (type === 'bath') {
            bath < 10 ? (bath = action === 'minus' ? bath - 1 : bath + 1) : bath = bath;
            bath > 0 ? this.handleCreateTag('Baths', `${bath} baths`) : this.handleDeleteTag('Baths', null);
        } else if (type === 'studio') {
            room = 0;
            bath = 1;
            await this.handleAmountRoom('bath', null);
            await this.handleCreateTag(header, type);
        }
        this.setState({room, bath});
    }

    public handleSelectProvinceChange = (e: any) => {
        this.handleCreateTag('Province', e.currentTarget.dataset.value);
        this.setState({isOpenProvice : false, isShowMapSearch : true});
    }

    public handleCreateTag  = (elem: any, value: any) => {
        const tag: any = [];
        const tags: any = this.state.tags.filter(tag => Object.keys(tag).toString() !== elem);
        tag[elem] = value;
        tags.push(tag);
        this.setState({tags});
    }

    public handleDeleteTag = (removedTag: any, event: any) => {
        const tags: any = this.state.tags.filter(tag => Object.keys(tag).toString() !== removedTag);
        if(event !== null) {
            console.log(removedTag);
        }
        this.setState({tags});
    }

    public handleSearchChange  = (e: any) => {
        this.setState({search: e.target.value});
    }

    public handleSearch  = (e: any) => {
        const {search ,room, bath, min, max, propertyType} = this.state;
        console.log(search ,room, bath, min, max, propertyType);
    }

    public renderProvince  = () => {
        const province = [];
        let count = 0;
        let row = 15;

        if(Math.ceil(provinceData.length/15) > 4) {
            row = Math.ceil(provinceData.length/4);
        }

        for (let i = 0; i < 4; i++) {
            const list = [];
            for (let j = 0; j < row; j++) {
                if(provinceData[count] !== undefined){
                    list.push(
                        <li onClick={this.handleSelectProvinceChange.bind(this)} className='select-dropdown-menu-item'
                            data-id={provinceData[count].id} data-value={provinceData[count].name} key={count.toString()}>
                            {provinceData[count].name}
                        </li>
                    );
                    count ++;
                }
            }
            province.push(<Col md={{span: 24}} lg={{span: 6}} key={i}><ul>{list}</ul></Col>);
        }
        return province;
    }

    public renderTags  = () => (
        this.state.tags.map((tag: any) => {
            let element = null;
            if(tag !== []) {
                const header = Object.keys(tag).toString();
                const value = tag[header];
                const isLongTag = (value).length > 20;
                const tagElem = (
                    <div className={style.search_tags}  key={header}>
                        <p className='header'>{header}</p>
                        <Tag key={value} className={style.search_tag} closable
                            onClose={(event: any) => this.handleDeleteTag(header, event)}>
                            {isLongTag ? `${(value).slice(0, 20)}...` : value}
                        </Tag>
                    </div>
                );
                element = isLongTag ? <Tooltip title={header} key={header}>{tagElem}</Tooltip> : tagElem;
            }
            return element;
        })
    )

    public renderBackground = (moduleParams: any) => {
        // let parser = '';
        let render = null;
        if (moduleParams.background_type === 'single_image') {
            let img = moduleParams.background_static && moduleParams.background_static.indexOf('http') !== -1 ?
                moduleParams.background_static :
                ((window as any).uriRoot + moduleParams.background_static);
            // parser = moduleParams.background_static;
            // if (parser.match('http')) {
            //     img = moduleParams.background_static;
            // } else {
            //     img = '/' + moduleParams.background_static;
            // }
            render = <img className={style.background_img} src={img} />;
        } else {
            if (this.state.isMobile) {
                let check = true;
                for (let i = 1; i <= 5; i++){
                    if (moduleParams['background_carousel_' + i] && check) {
                        let img =  moduleParams['background_carousel_' + i] &&  moduleParams['background_carousel_' + i].indexOf('http') !== -1 ?
                        moduleParams['background_carousel_' + i] :
                        ((window as any).uriRoot +  moduleParams['background_carousel_' + i]);
                        render = <img className={style.background_img} src={img} />;
                        check = false;
                    }
                }
            } else {
                const list = [];
                for (let i = 1; i <= 5; i++){
                    if (moduleParams['background_carousel_' + i]) {
                        let img =  moduleParams['background_carousel_' + i] &&  moduleParams['background_carousel_' + i].indexOf('http') !== -1 ?
                        moduleParams['background_carousel_' + i] :
                        ((window as any).uriRoot +  moduleParams['background_carousel_' + i]);
                        list.push(
                            <div key={i} >
                                <img className={style.background_img} src={img} />
                            </div>
                        );
                    }
                }
                render = <Carousel dots={false} draggable={false} touchMove={false} autoplay>{list}</Carousel>;
            }
        }
        return render;
    }
    public renderSearchInput = () => {
        if(this.state.isMobile){
            return ( <Input suffix={<Icon type='search' className='certain-category-icon' />}
                value={this.state.search} size='large'
                onChange={this.handleSearchChange} onPressEnter={this.handleSearch}
                placeholder={this.context.intl.formatMessage({ id: 'Enter Property Name' })}
            />);
        } else {
            return ( <Input size='large' onChange={this.handleSearchChange} value={this.state.search}
                placeholder={this.context.intl.formatMessage({ id: 'Enter Property Name' })}
            />);
        }
    }

    public renderPropertyType = () => (
        <Col sm={{span: 24}} md={{span: 24}} lg={{span: 5}} className={style.search_col}>
            <Select size='large' style={{width:'100%',padding:'0'}}
                placeholder={this.context.intl.formatMessage({ id: 'Select Property Type' })}
                onChange={this.handleSelectPropertyTypeChange}
            >
                <OptGroup label='Residential'>
                    <Option value='condominium'>Condominium</Option>
                    <Option value='townhouse'>Townhouse</Option>
                    <Option value='house'>House</Option>
                </OptGroup>
                <OptGroup label='Commercial'>
                    <Option value='officeSpace'>Office Space</Option>
                    <Option value='commercialBuilding'>Commercial Building</Option>
                </OptGroup>
            </Select>
        </Col>
    )

    public renderBuyRentType = () => (
        <Col sm={{span: 24}} md={{span: 24}} lg={{span: 3}} className={style.search_col}>
            <Select size='large' style={{width:'100%',padding:'0'}}
                placeholder={this.context.intl.formatMessage({id: 'Buy/Rent'})}
                onChange={this.handleSelectBuyRentTypeChange}
            >
                <Option value='buy'>Buy</Option>
                <Option value='rent'>Rent</Option>
                <Option value='buyrent'>Buy/Rent</Option>
            </Select>
        </Col>
    )

    public renderSkytrain = () => (
        <Col sm={{span: 24}} md={{span: 24}} lg={{span: 4}} className={style.search_col}>
            <Select size='large' style={{width:'100%',padding:'0'}}
                className={style.search_sky_train}
                placeholder={this.context.intl.formatMessage({id: 'SKYTRAIN'})}
                onChange={this.handleSelectBuyRentTypeChange}
            >
                <Option value='buy'>Buy</Option>
                <Option value='rent'>Rent</Option>
                <Option value='buyrent'>Buy/Rent</Option>
            </Select>
        </Col>
    )

    public renderButtonSearch = () => (
        <Col sm={{span: 24}} md={{span: 24}} lg={{span: 3}} className={style.search_col}>
            <Button size='large' type='primary' style={{width:'100%',padding:'0'}} className={style.primary_button} onClick={this.handleSearch}>
                {this.context.intl.formatMessage({id: 'SEARCH'})}
            </Button>
        </Col>
    )

    public renderAdvanceSearchButton = (md: any, lg: any, fnOpen: any, fnClick: any, message: any ) => (
        <Col md={{span: md}} lg={{span: lg}} className={style.search_advance_col}>
            <Button size='large' style={{width:'100%',padding:'0'}}
                className={`${style.search_advance_button} ${fnOpen ? 'search_advance_button_active' : ''}`}
                onClick={(e: any) => fnClick(e)}>
                {this.context.intl.formatMessage({id: message})}
            </Button>
        </Col>
    )

    public renderAdvanceSearch = (moduleParams: any) => {
        let render: any = null;
        if (this.state.isOpen) {
            render = <Row className={style.search_advance_form}>
                {moduleParams.property_province === '1' ? this.renderAdvanceSearchButton(3, 2, this.state.isOpenProvice, this.handleOpenProvinceSearch, 'PROVINCE') /* PROVINCE */ : ''}
                {moduleParams.property_district === '1' ? this.renderAdvanceSearchButton(3, 2, '','', 'DISTRICT') /* DISTRICT */: ''}
                {moduleParams.property_zone === '1' ? this.renderAdvanceSearchButton(4, 3, '', '', 'ZONE AREA') /* ZONE AREA */: ''}
                {moduleParams.property_area === '1' ? this.renderAdvanceSearchButton(5, 3, '', '', 'SEARCH BY AREA') /* SEARCH BY AREA */: ''}
                {moduleParams.property_price === '1' ? this.renderAdvanceSearchButton(3, 2, this.state.isOpenPrice, this.handleOpenPriceSearch, 'PRICE') /* PRICE */: ''}
                {moduleParams.property_beds_baths === '1' ? this.renderAdvanceSearchButton(4, 3, this.state.isOpenRoom, this.handleOpenRoomSearch,
                    this.state.propertyGroupType === 'residential' ? 'BEDS & BATHS' : 'ROOM & BATHS') /* BEDS/ROOM & BATHS */: ''
                }
            </Row>;
        }
        return render;
    }
    

    public renderSelectProvince = () => {
        let render: any = null;
        if (this.state.isOpenProvice) {
            render = <Row className={style.search_advance} style={{ paddingTop: '.5em', position: 'initial' }}>
                <Col md={{ span: 22 }} lg={{ span: 20 }} className={style.province}>
                    <Icon type='caret-up'/>
                    <Row className='select-dropdown'>
                        <div className='ant-select-dropdown-menu  ant-select-dropdown-menu-root ant-select-dropdown-menu-vertical'>
                            {this.renderProvince()}
                        </div>
                    </Row>
                    <Icon className={style.button_close} type='close' onClick={this.handleOpenProvinceSearch}/>
                </Col>
            </Row>;
        }
        return render;
    }

    public renderSelectPrice = () => {
        let render: any = null;
        if (this.state.isOpenPrice) {
            render = <Row className={style.search_advance} style={{paddingTop: '.5em', position:'initial'}}>
                <Col md={{span: 22}} lg={{span: 20}}  className={style.price_search}>
                    <Icon type='caret-up'/>
                    <Row  style={{padding: '4rem 4rem 2rem'}}>
                        <Col span={2}>{this.convertPrice(this.state.startMin)}</Col>
                        <Col md={{span :19}} lg={{span :20}}>
                            <Slider range step={1000} min = {this.state.startMin} max = {this.state.startMax}
                                tipFormatter={this.convertPrice} defaultValue={[this.state.startMin, this.state.startMax]}
                                onAfterChange={this.handlePriceChange}
                                />
                        </Col>
                        <Col span={2} style={{float: 'right'}}>{this.convertPrice(this.state.startMax)}</Col>
                    </Row>
                    <Row style={{paddingBottom: '2rem'}}>Refine by price range</Row>
                    <Icon className={style.button_close} type='close' onClick={this.handleOpenPriceSearch}/>
                </Col>
            </Row>;
        }
        return render;
    }

    public renderSelectRoom = () => {
        let render: any = null;
        if (this.state.isOpenRoom) {
            render = <Row className={style.search_advance}  style={{paddingTop: '.5em', position:'initial'}}>
                <Col md={{span: 22}} lg={{span: 20}} className={style.beds_baths_search}>
                    <Icon type='caret-up' className={style.button_anticon}/>
                    <Row className={style.beds_baths_search_ant_row}>
                        <Col md={{span: 8}} lg={this.state.propertyGroupType === 'residential' ? 8: 12}
                            style={{margin: '0.5rem 0', padding: '0 2rem'}}>
                            <Row className={style.beds_baths_search_row}>
                                <Col span={7}>
                                    <Button shape='circle' icon='minus' disabled={this.state.room === 0 ? true: false}
                                        onClick={() => this.handleAmountRoom('room','minus')} />
                                </Col>
                                <Col span={10}>
                                    <h3>{this.state.room}</h3>
                                    <h4>{this.state.propertyGroupType === 'residential' ? 'BEDS': 'ROOM'}</h4>
                                </Col>
                                <Col span={7}>
                                    <Button shape='circle' icon='plus' disabled={this.state.room === 10 ? true: false}
                                        onClick={() => this.handleAmountRoom('room','plus')} />
                                </Col>
                            </Row>
                            <div className={style.divider}></div>
                        </Col>
                        <Col md={{span: 8}} lg={this.state.propertyGroupType === 'residential' ? 8: 12}
                            style={{margin: '0.5rem 0', padding: '0 2rem'}}>
                            <Row className={style.beds_baths_search_row}>
                                <Col span={7}>
                                    <Button shape='circle' icon='minus' disabled={this.state.bath === 0 ? true: false}
                                        onClick={() => this.handleAmountRoom('bath','minus')} />
                                </Col>
                                <Col span={10}>
                                    <h3>{this.state.bath}</h3>
                                    <h4>BATHS</h4>
                                </Col>
                                <Col span={7}>
                                    <Button shape='circle' icon='plus' disabled={this.state.bath === 10 ? true: false}
                                        onClick={() => this.handleAmountRoom('bath','plus')} />
                                </Col>
                            </Row>
                        </Col>
                        <Col md={{span: 8}} lg={{span: 8}} className={style.studio_room} 
                            style={{display : this.state.propertyGroupType === 'residential' ? '': 'none'}}>
                            <Row>
                                <Button size='large' onClick={() => this.handleAmountRoom('studio',null)}>STUDIO</Button>
                            </Row>
                        </Col>
                    </Row>
                    <Icon className={style.button_close} type='close' onClick={this.handleOpenRoomSearch}/>
                </Col>
            </Row>;
        }
        return render;
    }

    public renderButtonAdvanceSearch = () => (
        <Row className={style.search_advance_content}>
            <div className={style.search_advance_text} onClick={this.handleOpenAdvanceSearch}>
                <Icon type='caret-up' style={{display: this.state.isOpen ? '' : 'none'}} />
                {this.state.isOpen ? <br/> : ''}
                {this.context.intl.formatMessage({id: 'ADVANCE SEARCH'})}
                {this.state.isOpen ? '' : <br/>}
                <Icon type='caret-down' style={{display: this.state.isOpen ? 'none' : ''}} />
            </div>
        </Row>
    )

    public renderMapSearch = () => (
        <div style={{ bottom: (this.state.isOpen ?'5rem':'') || (this.state.isOpen && this.state.tags.length > 0 ? '2rem': '')}}
            className={style.search_map}>
            <Row className={style.search_map_row}>
                <Col xs={{ span: 13 }} md={{ span: 5 }} lg={{ span: 3 }} className={style.search_advance_col}>
                    <Button size='large' style={{ width: '100%', padding: '0' }}
                        className={style.map_search_button}>
                        <Icon type='global' />
                        {this.context.intl.formatMessage({ id: 'Map Search' })}
                    </Button>
                </Col>
            </Row>
        </div>
    )

    public onWindowResize = () => {
        this.setState({
            isMobile :  window.innerWidth < 768,
            isTablet: window.innerWidth >= 768 && window.innerWidth <= 1023,
            isBrowser : window.innerWidth > 1023
        });
        if(this.state.isMobile){
            this.setState({
                isOpen : false,
                isOpenPrice: false,
                isOpenRoom: false,
                isOpenProvice: false,
                isOpenTags: false,
            });
        }
    }
    
    public componentWillMount() {
        this.onWindowResize();
    }

    public componentDidMount() {
        window.addEventListener('resize', this.onWindowResize);
    }

    public componentWillUnmount() {
        window.removeEventListener('resize', this.onWindowResize);
    }

    public render() {
        const moduleParams = this.props.moduleParams;
        return (
            <div className={style.modWebportalSearchContainer}>
                    <div className={style.search_caption}>
                        <p className={style.search_caption_head}>BE ESTATE</p>
                        <p className={style.search_caption_des}>MORE THAN TRUST</p>
                    </div>

                    {this.renderBackground(moduleParams)}

                    <div className={style.search_content}>
                        <div className={style.search_feature}>
                            <Row className={style.search_form}>
                                <Col xs={{span: 24}} sm={{span: 24}} md={{span: 24}} lg={{span: 7}} className={style.search_col}>
                                    {this.renderSearchInput() /* SEARCH INPUT */}
                                </Col>
                                {moduleParams.property_search.property_type === '1' &&!this.state.isMobile ? this.renderPropertyType() : '' /* SELECT PROPERTY TYPE */}
                                {moduleParams.property_search.property_buy_rent_type === '1' &&!this.state.isMobile ? this.renderBuyRentType() : '' /* SELECT BUY / RENT TYPE */}
                                {moduleParams.property_search.property_skytrain === '1' &&!this.state.isMobile ? this.renderSkytrain() : '' /* SELECT SKY TRAIN : Show when Province has Skytrain */}
                                {!this.state.isMobile ? this.renderButtonSearch() : '' /*  BUTTON SEARCH */}
                            </Row>

                            {/* MENU ADVANCE SEARCH */}
                            {moduleParams.property_advance_search.property_advance_search === '1' && !this.state.isMobile ? this.renderAdvanceSearch(moduleParams.property_advance_search) : ''}
                            {/* END MENU ADVANCE SEARCH */}
                            
                            {this.state.isOpenProvice ? this.renderSelectProvince() : ''}
                            {this.state.isOpenPrice ? this.renderSelectPrice() : ''}
                            {this.state.isOpenRoom ? this.renderSelectRoom() : ''}


                            {/* TAGS */}
                            {((!this.state.isMobile) && (this.state.tags.length > 0)) ?
                                <Row className={style.search_advance_tags}>
                                    {this.renderTags() /* BUTTON ADVANCE SEARCH */ }
                                </Row> : ''
                            }
                            {/*END TAGS */}

                            {moduleParams.property_advance_search.property_advance_search === '1' && !this.state.isMobile ? this.renderButtonAdvanceSearch() /* BUTTON ADVANCE SEARCH */ : ''}

                        </div>
                    </div>
                    {moduleParams.property_map_search === '1' && this.state.isShowMapSearch ? this.renderMapSearch() : '' /* MAP SEARCH */}
            </div>
        );
    }
}

jQuery(document).ready(() => {
    const id = 'modWebportalSearchUi';
    waitForElement('#' + id, () => {
        const moduleParams = JSON.parse(atob(jQuery('#' + id).data('hint')));
        console.log(tag + 'Starting ' + id + ' with params :', moduleParams);
        const l: string = moduleParams.language;
        const currentAppLocale = languages[l];
        ReactDOM.render(
            <Provider store={store}>
                <LocaleProvider locale={currentAppLocale.antd}>
                    <IntlProvider
                        locale={currentAppLocale.locale}
                        messages={currentAppLocale.messages}>
                        <ModWebportalSearchUi moduleParams={moduleParams}/>
                    </IntlProvider>
                </LocaleProvider>

            </Provider>,
            document.getElementById(id)
        );
    });

});
