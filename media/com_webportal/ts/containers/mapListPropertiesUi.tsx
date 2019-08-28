import * as React from 'react';
import { connect } from 'react-redux';
import { createSelector } from 'reselect';
import * as style from './styles/mapListPropertiesUi.less';
import { isEmpty } from 'ramda';
import GoogleMapReact from 'google-map-react';
import { Row, Col, Pagination, Select, Button } from 'antd';
import { GoLocation } from 'react-icons/go';
import { IoIosClose } from 'react-icons/io';

require('../../../jui/js/owl.carousel.min.js');

const { Option } = Select;

const back = require('../../../jui/img/back.svg');
const next = require('../../../jui/img/next.svg');
const plans = require('../images/plans.png');
const beds = require('../images/bed.png');
const baths = require('../images/bathtub.png');

const placesData = [
	{
		id: 1,
		name: 'Property name',
		location: 'District, Province',
		price: 4500000,
		type: 'Property type',
		baths: 2,
		beds: 1,
		unitArea: 78,
		longitude: 12.63376,
		latitude: 66.02219,
		images: [
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
			'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80',
			'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
			'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
		]
	},
	{
		id: 2,
		name: 'Property name',
		location: 'District, Province',
		price: 2500000,
		type: 'Property type',
		baths: 1,
		beds: 2,
		unitArea: 78,
		longitude: 16.50279,
		latitude: 68.03515,
		images: [
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
			'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80',
			'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
			'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
		]
	},
	{
		id: 3,
		name: 'Property name',
		location: 'District, Province',
		price: 5500000,
		type: 'Property type',
		baths: 2,
		beds: 2,
		unitArea: 78,
		longitude: 7.53744,
		latitude: 60.08929,
		images: [
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
			'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80',
			'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
			'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
		]
	},
	{
		id: 4,
		name: 'Property name',
		location: 'District, Province',
		price: 5000000,
		type: 'Property type',
		baths: 1,
		beds: 1,
		unitArea: 78,
		longitude: 11.38411,
		latitude: 62.57481,
		images: [
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
			'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80',
			'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
			'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
		]
	},
	{
		id: 5,
		name: 'Property name',
		location: 'District, Province',
		price: 3500000,
		type: 'Property type',
		baths: 2,
		beds: 2,
		unitArea: 78,
		longitude: 6.96781,
		latitude: 60.96335,
		images: [
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
			'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80',
			'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
			'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
		]
	},
	{
		id: 6,
		name: 'Property name',
		location: 'District, Province',
		price: 3000000,
		type: 'Property type',
		baths: 1,
		beds: 2,
		unitArea: 78,
		longitude: 8.49139,
		latitude: 59.87111,
		images: [
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
			'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80',
			'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
			'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
		]
	},
	{
		id: 7,
		name: 'Property name',
		location: 'District, Province',
		price: 4000000,
		type: 'Property type',
		baths: 2,
		beds: 3,
		unitArea: 78,
		longitude: 11.38411,
		latitude: 50.87111,
		images: [
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
			'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80',
			'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
			'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
		]
	},
	{
		id: 8,
		name: 'Property name',
		location: 'District, Province',
		price: 3800000,
		type: 'Property type',
		baths: 1,
		beds: 2,
		unitArea: 78,
		longitude: 7.53744,
		latitude: 51.87111,
		images: [
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
			'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80',
			'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
			'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
		]
	},
	{
		id: 9,
		name: 'Property name',
		location: 'District, Province',
		price: 4520000,
		type: 'Property type',
		baths: 2,
		beds: 1,
		unitArea: 78,
		longitude: 12.63376,
		latitude: 61.87111,
		images: [
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
			'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80',
			'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
			'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
		]
	}
];

// tslint:disable-next-line
interface IProperties {
	moduleParams: any;
}

// tslint:disable-next-line
interface IState {
	//
}

class MapListPropertiesUi extends React.PureComponent<IProperties, IState> {
	public state = {
		width: 0,
		isMobile: false,
		isTablet: false,
		isLaptop: false,
		isLaptopL: false,
		isLaptopXL: false,
		openMaps: true,
		places: [],
		placesData: [],
		center: {
			lat: 59.95,
			lng: 30.33
		},
		zoom: 12,
		bounds: {
			ne: { lat: 0, lng: 0 },
			nw: { lat: 0, lng: 0 },
			se: { lat: 0, lng: 0 },
			sw: { lat: 0, lng: 0 }
		},
		defaultCurrentPage: 1,
		pageSize: 6,
		start: 0,
		end: 6,
		all: 0,
		hover: false,
		currentPage: 1,
		spanPropertyList: 12,
		spanPropertyMap: 12,
		spanPropertyListDetail: 24,
		spanPropertyListImage: 8,
		spanPropertyListDes: 24,
		hightPropertyList: '85%',
		hightPropertyListDetail: 300,
		hightItemImage: 250,
		hightMapListPropertiesContainer: 800
	};

	Marker = (props: any) => {
		const img = props.image;
		return (
			<div className='properties' onMouseEnter={this.onMouseEnterProperties.bind(this)} onMouseLeave={this.onMouseLeaveProperties.bind(this)}>
				<div id={props.id} className={`${style.maker} properties-marker`} onClick={this.onClickMarker.bind(this)} />
				<div className='properties-detail'>{props.text}</div>
				<div className='properties-content'>
					<div className='circCont' onClick={this.onClickClosePropertiesDetail.bind(this)}>
						<IoIosClose />
					</div>
					<div className='properties-text'>{props.text}</div>
					<div className='properties-location'>
						<GoLocation /> District, Province
					</div>
					<div className='properties-image owl-carousel owl-theme grid-animate' data-effect='slideLeft'>
						{this.renderPropertiesImage(img)}
					</div>
					<div className='button-view-detail'>
						<Button className='view-detail'>View Detail</Button>
					</div>
					<div className='summary-properties'>Showing 1 of 1 Properties</div>
				</div>
			</div>
		);
	};

	getMapBounds = (maps: any, places: any) => {
		const bounds = new maps.LatLngBounds();

		places.forEach((place: any) => {
			bounds.extend(new maps.LatLng(place.latitude, place.longitude));
		});
		return bounds;
	};

	bindResizeListener = (map: any, maps: any, bounds: any) => {
		maps.event.addDomListenerOnce(map, 'idle', () => {
			maps.event.addDomListener(window, 'resize', () => {
				map.fitBounds(bounds);
			});
		});
	};

	apiIsLoaded = (map: any, maps: any, places: any) => {
		const bounds = this.getMapBounds(maps, places);
		this.setState({ bounds });
		map.fitBounds(bounds);
		this.bindResizeListener(map, maps, bounds);
	};

	onZoomChanged = (event: any) => {
		const bounds = event.bounds;
		$.when(this.setState({ bounds })).then(async () => {
			await this.onFilterPropertyList();
		});
	};

	renderMaps = () => {
		const { placesData } = this.state;
		return (
			<GoogleMapReact
				bootstrapURLKeys={{ key: 'AIzaSyBobyTTiskP_YfQXcokYGmND1ouViqCX8w' }}
				defaultZoom={this.state.zoom}
				defaultCenter={this.state.center}
				yesIWantToUseGoogleMapApiInternals
				onGoogleApiLoaded={({ map, maps }) => this.apiIsLoaded(map, maps, placesData)}
				onChange={this.onZoomChanged.bind(this)}
			>
				{this.renderMaker(placesData)}
			</GoogleMapReact>
		);
	};

	renderMaker = (places: any) => {
		return places.map((place: any) => (
			<this.Marker id={place.id} key={place.id} text={place.name} image={place.images} lat={place.latitude} lng={place.longitude} />
		));
	};

	renderPropertyImage = (images: any) => {
		let renderImage = [];
		renderImage = images.map((image: any, index: any) => (
			<div className='item-wrap' key={'item-' + index}>
				<div className='item-wrap-inner'>
					<div className='item-image' style={{ height: this.state.hightItemImage }}>
						<img src={image} />
					</div>
				</div>
			</div>
		));
		return renderImage;
	};

	renderPropertiesImage = (images: any) => {
		let renderImage = [];
		const price = 888888;
		const priceFormat = new Intl.NumberFormat('th-TH', { style: 'currency', currency: 'THB', minimumFractionDigits: 0 }).format(price);
		renderImage = images.map((image: any, index: any) => (
			<div className='item-wrap' key={'item-' + index}>
				<div className='item-wrap-inner'>
					<div className='item-image' style={{ height: this.state.hightItemImage }}>
						<img src={image} />
					</div>
				</div>
				<div className='item-caption'>
					<Row className='properties-detail-row'>
						<Col className='properties-detail-col properties-detail-price-type' span={8}>
							<div className='properties-price'>{priceFormat}</div>
							<div className='properties-type'>Property type</div>
						</Col>
						<Col className='properties-detail-col properties-detail-icon' span={16}>
							<Row className='properties-icon'>
								<Col span={7} className='icon'>
									<img src={beds} alt='Unit Area' />
									<div>2</div>
								</Col>
								<Col span={7} className='icon'>
									<img src={baths} alt='Unit Area' />
									<div>2</div>
								</Col>
								<Col span={10} className='icon'>
									<img src={plans} alt='Unit Area' />
									<div>78.5 Sq.m</div>
								</Col>
							</Row>
						</Col>
					</Row>
				</div>
			</div>
		));
		return renderImage;
	};

	renderSummaryResult() {
		let { start, end, all } = this.state;
		const render = (
			<div className='summary-result'>
				<Row className='summary-result-row'>
					<Col className='summary-result-col first' span={18}>
						<div className='search-keyword'>Search keyword</div>
					</Col>
					{!this.state.isTablet && !this.state.isMobile ? (
						<Col className='summary-result-col last' span={6}>
							{this.state.openMaps ? (
								<Button className='colse-maps' onClick={this.handleMaps.bind(this)}>
									<GoLocation /> Close maps
								</Button>
							) : (
								<Button className='open-maps' onClick={this.handleMaps.bind(this)}>
									<GoLocation /> Open maps
								</Button>
							)}
						</Col>
					) : (
						''
					)}
				</Row>
				<Row className='summary-result-row'>
					<Col className='summary-result-col first' span={18}>
						<div className='summary-showing'>
							Showing {end > 0 ? start + 1 : start}-{end > all ? all : end} of {all} listings.
						</div>
					</Col>
					<Col className='summary-result-col last' span={6}>
						<Select className='dropdown-sort' placeholder='Sort by' onChange={this.onSortChange.bind(this)}>
							<Option value='price'>Price</Option>
							<Option value='beds'>Beds</Option>
							<Option value='baths'>Baths</Option>
						</Select>
					</Col>
				</Row>
			</div>
		);
		return render;
	}

	renderPropertyList() {
		let renderItem = [];
		const { places } = this.state;
		renderItem = places.map((place: any, index: any) => (
			<Col
				span={this.state.spanPropertyListDetail}
				className='property-list-detail'
				key={`property-list-detail-${index}`}
				data-id={place.id}
				style={{ height: this.state.hightPropertyListDetail }}
				onMouseEnter={this.onMouseEnterPropertyList.bind(this)}
				onMouseLeave={this.onMouseLeavePropertyList.bind(this)}
			>
				<div className='property-list-description'>
					<Col
						className='property-list-image owl-carousel owl-theme grid-animate'
						data-effect='slideLeft'
						span={this.state.spanPropertyListImage}
					>
						{this.renderPropertyImage(place.images)}
					</Col>
					<Col className='property-list-des' span={this.state.spanPropertyListDes}>
						<div className='property-detail'>
							<Row className='property-detail-row'>
								<Col className='property-detail-col' span={24}>
									<div className='property-name'>
										{place.name} {place.id}
										<span className='property-id'>(Property ID {place.id})</span>
									</div>
								</Col>
								<Col className='property-detail-col' span={24}>
									<div className='property-location'>
										<GoLocation /> {place.location}
									</div>
								</Col>
							</Row>
							<Row className='property-detail-row'>
								<Col className='property-detail-col property-detail-price-type' span={8}>
									<div className='property-price'>
										{new Intl.NumberFormat('th-TH', { style: 'currency', currency: 'THB', minimumFractionDigits: 0 }).format(
											place.price
										)}
									</div>
									<div className='property-type'>{place.type}</div>
								</Col>
								<Col className='property-detail-col property-detail-icon' span={16}>
									<Row className='property-icon'>
										{place.beds ? (
											<Col span={8} className='icon'>
												<img src={beds} alt='Unit Area' />
												<div>{place.beds}</div>
											</Col>
										) : (
											''
										)}
										{place.baths ? (
											<Col span={8} className='icon'>
												<img src={baths} alt='Unit Area' />
												<div>{place.baths}</div>
											</Col>
										) : (
											''
										)}
										{place.unitArea ? (
											<Col span={8} className='icon'>
												<img src={plans} alt='Unit Area' />
												<div>{place.unitArea} Sq.m</div>
											</Col>
										) : (
											''
										)}
									</Row>
								</Col>
							</Row>
						</div>
					</Col>
				</div>
			</Col>
		));
		return (
			<div className='property-list-detail-item' style={{ height: this.state.hightPropertyList }}>
				{renderItem}
			</div>
		);
	}

	renderOwlCarousel() {
		const propertyListImage = $('.property-list-image');
		($(propertyListImage) as any).owlCarousel('destroy');
		($(propertyListImage) as any).owlCarousel({
			items: 1,
			loop: false,
			nav: true,
			navText: [ `<img src='${back}' />`, `<img src='${next}'/>` ],
			dots: false,
			merge: true,
			autoHeight: false,
			autoPlay: false,
			slideSpeed: 1000,
			paginationSpeed: 800,
			rewindSpeed: 1000
		});
	}

	renderPagination() {
		const { all } = this.state;
		return (
			<div className='property-list-pagination'>
				<Pagination
					defaultCurrent={this.state.defaultCurrentPage}
					pageSize={this.state.pageSize}
					total={all}
					onChange={this.onPaginationChange}
				/>
			</div>
		);
	}

	onMouseEnterPropertyList(event: any) {
		$('.properties-content').css({ visibility: 'hidden', opacity: '0' });
		$('.properties-detail').css({ visibility: 'hidden', opacity: '0' });
		if (this.state.openMaps) {
			var currentTarget = event.currentTarget;
			var id = $(currentTarget).attr('data-id');
			var target = $(`#${id}`).parent();
			$(`#${id}`).css({
				transform: 'scale(1.2) translate(-50%, -25%)',
				'z-index': '1'
			});
			$('.properties-detail', target).css({ visibility: 'visible', opacity: '1' });
		}
	}

	onMouseLeavePropertyList(event: any) {
		if (this.state.openMaps) {
			var currentTarget = event.currentTarget;
			var id = $(currentTarget).attr('data-id');
			var target = $(`#${id}`).parent();
			$(`#${id}`).css({
				transform: '',
				'z-index': '-1'
			});
			$('.properties-detail', target).css({ visibility: 'hidden', opacity: '0' });
		}
	}

	onMouseEnterProperties(event: any) {
		if (this.state.openMaps) {
			var currentTarget = event.currentTarget;
			var target = $('.properties-marker', currentTarget);
			$(target).css({
				transform: 'scale(1.2) translate(-50%, -25%)',
				'z-index': '1'
			});
			$('.properties-detail', currentTarget).css({ visibility: 'visible', opacity: '1' });
		}
	}

	onMouseLeaveProperties(event: any) {
		if (this.state.openMaps) {
			var currentTarget = event.currentTarget;
			var target = $('.properties-marker', currentTarget);
			$(target).css({
				transform: '',
				'z-index': '-1'
			});
			$('.properties-detail', currentTarget).css({ visibility: 'hidden', opacity: '0' });
		}
	}

	onClickMarker(event: any) {
		var currentTarget = event.currentTarget;
		var target = $(currentTarget).parent();
		$('.properties-detail', target).css({ visibility: 'hidden', opacity: '0' });
		$('.properties-content').css({ visibility: 'hidden', opacity: '0' });
		if (this.state.openMaps) {
			this.setState({ propertiesOpen: true });
			const propertiesImage = $('.properties-content .properties-image', target);
			const propertiesContent = $('.properties-content', target);
			$(target).css({
				transform: '',
				'z-index': '-1'
			});
			$(propertiesContent).css({ visibility: 'visible', opacity: '1' });
			($(propertiesImage) as any).owlCarousel('destroy');
			($(propertiesImage) as any).owlCarousel({
				items: 1,
				loop: false,
				nav: true,
				navText: [ `<img src='${back}' />`, `<img src='${next}'/>` ],
				dots: false,
				merge: true,
				autoHeight: false,
				autoPlay: false,
				slideSpeed: 1000,
				paginationSpeed: 800,
				rewindSpeed: 1000
			});
		}
	}

	onClickClosePropertiesDetail(event: any) {
		$('.properties-content').css({ visibility: 'hidden', opacity: '0' });
	}

	onSortChange(value: any) {
		const { placesData } = this.state;
		let allPlaces = [] as any;

		switch (value) {
			case 'price':
				allPlaces = placesData.sort((first: any, last: any) => (first.price > last.price ? 1 : last.price > first.price ? -1 : 0));
				break;
			case 'beds':
				allPlaces = placesData.sort((first: any, last: any) => (first.beds > last.beds ? 1 : last.beds > first.beds ? -1 : 0));
				break;
			case 'baths':
				allPlaces = placesData.sort((first: any, last: any) => (first.baths > last.baths ? 1 : last.baths > first.baths ? -1 : 0));
				break;
		}
		$.when(
			this.setState({
				placesData: allPlaces
			})
		).then(async () => {
			await this.onFilterPropertyList();
		});
	}

	onPaginationChange = (currentPage: any, pageSize: any) => {
		const start = (currentPage - 1) * pageSize;
		const end = pageSize * currentPage;
		$.when(this.setState({ start, end, currentPage, pageSize })).then(async () => {
			await this.onFilterPropertyList();
		});
	};

	onFilterPropertyList = () => {
		const { start, end, bounds, placesData } = this.state;
		let allPlaces = [] as any;
		placesData.forEach((place: any) => {
			if (bounds.ne.lat > place.latitude && bounds.se.lat < place.latitude) {
				if (bounds.ne.lng > place.longitude && bounds.sw.lng < place.longitude) {
					allPlaces.push(place);
				}
			}
		});

		const places = allPlaces.slice(start, end);
		const all = allPlaces.length;

		$.when(this.setState({ places, all })).then(async () => {
			await this.renderOwlCarousel();
		});
	};

	handleMaps() {
		let openMaps = true;
		{
			this.state.openMaps ? (openMaps = false) : (openMaps = true);
		}
		$.when(this.setState({ openMaps }))
			.then(async () => {
				await this.handleSizeSpan();
			})
			.then(async () => {
				await this.renderOwlCarousel();
			});
	}

	handleSizeSpan() {
		let spanPropertyList = 0;
		let spanPropertyMap = 0;
		let spanPropertyListDetail = 0;
		let spanPropertyListImage = 0;
		let spanPropertyListDes = 0;
		let hightPropertyListDetail = 0;
		let hightItemImage = 0;
		let pageSize = 6;
		let end = 6;
		let hightPropertyList = '85%';
		let hightMapListPropertiesContainer = 800;

		if (this.state.openMaps) {
			spanPropertyListDetail = 24;
			if (this.state.isLaptop) {
				spanPropertyMap = 12;
				spanPropertyList = 12;
				spanPropertyListImage = 24;
				spanPropertyListDes = 24;
				hightPropertyListDetail = 430;
				hightItemImage = 250;
			} else if (this.state.isLaptopL) {
				spanPropertyMap = 13;
				spanPropertyList = 11;
				spanPropertyListImage = 24;
				spanPropertyListDes = 24;
				hightPropertyListDetail = 430;
				hightItemImage = 275;
			} else if (this.state.isLaptopXL) {
				spanPropertyMap = 13;
				spanPropertyList = 11;
				spanPropertyListImage = 12;
				spanPropertyListDes = 12;
				hightPropertyListDetail = 222;
				hightItemImage = 210;
			}
		} else {
			spanPropertyMap = 0;
			spanPropertyList = 24;
			if (this.state.isMobile) {
				spanPropertyListDetail = 24;
				spanPropertyListImage = 24;
				spanPropertyListDes = 24;
				hightPropertyListDetail = 430;
				hightItemImage = 250;
			} else if (this.state.isTablet) {
				spanPropertyListDetail = 24;
				spanPropertyListImage = 12;
				spanPropertyListDes = 12;
				hightPropertyListDetail = 265;
				hightItemImage = 250;
			} else if (this.state.isLaptop) {
				spanPropertyListDetail = 12;
				spanPropertyListImage = 24;
				spanPropertyListDes = 24;
				hightPropertyListDetail = 430;
				hightItemImage = 275;
				hightPropertyList = '100%';
				hightMapListPropertiesContainer = 900;
			} else if (this.state.isLaptopL) {
				spanPropertyListDetail = 8;
				spanPropertyListDes = 24;
				spanPropertyListImage = 24;
				hightPropertyListDetail = 430;
				hightItemImage = 250;
				hightPropertyList = '100%';
				hightMapListPropertiesContainer = 900;
			} else if (this.state.isLaptopXL) {
				spanPropertyListDetail = 6;
				spanPropertyListDes = 24;
				spanPropertyListImage = 24;
				hightPropertyListDetail = 400;
				hightItemImage = 250;
				pageSize = 8;
				end = 8;
				hightPropertyList = '100%';
				hightMapListPropertiesContainer = 900;
			}
		}

		$.when(
			this.setState({
				spanPropertyList,
				spanPropertyMap,
				spanPropertyListDetail,
				spanPropertyListImage,
				spanPropertyListDes,
				hightMapListPropertiesContainer,
				hightPropertyListDetail,
				hightPropertyList,
				hightItemImage,
				pageSize,
				end
			})
		).then(async () => {
			this.onFilterPropertyList();
		});
	}

	onWindowResize = () => {
		if (window.innerWidth != this.state.width) {
			$.when(
				this.setState({
					isMobile: window.innerWidth <= 425,
					isTablet: window.innerWidth > 425 && window.innerWidth <= 768,
					isLaptop: window.innerWidth > 768 && window.innerWidth <= 1024,
					isLaptopL: window.innerWidth > 1024 && window.innerWidth <= 1439,
					isLaptopXL: window.innerWidth > 1439,
					openMaps: window.innerWidth <= 768 ? false : true
				})
			)
				.then(async () => {
					await this.handleSizeSpan();
				})
				.then(async () => {
					await this.renderOwlCarousel();
				});
		}
	};

	componentWillUnmount() {
		window.removeEventListener('resize', this.onWindowResize);
	}

	componentWillMount() {
		const width = window.innerWidth;
		const all = placesData.length;
		$.when(this.setState({ width, placesData, all })).then(async () => {
			await this.onFilterPropertyList();
		});
		this.onWindowResize();
	}

	componentDidMount() {
		window.addEventListener('resize', this.onWindowResize);
		this.renderOwlCarousel();
	}

	public render() {
		const { placesData } = this.state;
		return (
			<div className={style.mapListPropertiesContainer} style={{ height: this.state.hightMapListPropertiesContainer }}>
				{!isEmpty(placesData) && (
					<Row className='map-row'>
						{!this.state.isTablet &&
							(this.state.openMaps && (
								<Col className='property-map' span={this.state.spanPropertyMap}>
									{this.renderMaps()}
								</Col>
							))}

						<Col className='property-list' span={this.state.spanPropertyList}>
							{this.renderSummaryResult()}
							{this.renderPropertyList()}
							{this.renderPagination()}
						</Col>
					</Row>
				)}
			</div>
		);
	}
}

const mapFnc = createSelector([], () => {
	return {};
});

const mapStateToProps = (state: any) => {
	return mapFnc(state);
};

const mapDispatchToProps = (dispatch: any) => {
	return {};
};
export default connect(mapStateToProps, mapDispatchToProps)(MapListPropertiesUi);
