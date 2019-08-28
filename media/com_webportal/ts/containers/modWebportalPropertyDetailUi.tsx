import * as React from 'react';
import * as ReactDOM from 'react-dom';
import { store } from '../redux/store';
import { Provider } from 'react-redux';
import * as style from './styles/modWebportalPropertyDetailUi.less';
import { waitForElement } from '../helpers/utilities';
import { LocaleProvider, Modal, Row, Col, Button, Icon, Form, Input, Popover, Select } from 'antd';
import languages from '../language';
import { IntlProvider, intlShape } from 'react-intl';
import GoogleMapReact from 'google-map-react';
import {
	FacebookShareButton,
	TwitterShareButton,
	EmailShareButton,
	LineShareButton,
	FacebookIcon,
	TwitterIcon,
	LineIcon,
	EmailIcon
} from 'react-share';

require('../../../jui/js/owl.carousel.min.js');
require('../../../jui/js/jquery-modal-video.min.js');

const lightbox = require('../../../jui/js/lightbox');
const back = require('../../../jui/img/back.svg');
const next = require('../../../jui/img/next.svg');
const swipe = require('../../../jui/img/swipe.svg');

const { TextArea } = Input;
const { Option } = Select;

const plans = require('../images/plans.png');
const beds = require('../images/bed.png');
const baths = require('../images/bathtub.png');
const price = require('../images/sale.png');

const tag = '[ModWebportalPropertyDetailUi] ';

interface IProperties {
	moduleParams: any;
	context?: any;
	form?: any;
}

interface IState {
	//
}

// tslint:disable-next-line:semicolon
class ModWebportalPropertyDetailUi extends React.PureComponent<IProperties, IState> {
	// @ts-ignore
	private static contextTypes = {
		intl: intlShape
	};

	public state = {
		width: 0,
		height: 0,
		visible: false,
		center: {
			lat: 59.95,
			lng: 30.33
		},
		zoom: 11,
		name: '',
		email: '',
		phone: '',
		detail: '',
		errors: {
			name: '',
			email: '',
			phone: ''
		}
	};

	constructor(props: IProperties) {
		super(props);

		try {
			//
			console.log(tag + 'Attempting to modify less constiables using -> props.moduleParams.less : ', props.moduleParams.less);
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

	public setBrowerTitle() {
		document.title = 'property-detail';
	}

	public renderSlider($gridslider: any) {
		$gridslider.owlCarousel({
			loop: false,
			responsive: {
				0: {
					items: 2,
					mouseDrag: true,
					touchDrag: true,
					nav: false
				},
				600: {
					items: 4,
					mouseDrag: false,
					touchDrag: false,
					nav: true
				},
				1000: {
					items: 6,
					mouseDrag: false,
					touchDrag: false,
					nav: true
				}
			},
			nav: true,
			navText: [ `<img src='${back}' />`, `<img src='${next}'/>` ],
			dots: false,
			merge: true,
			autoHeight: false,
			autoPlay: false,
			slideSpeed: 1000,
			paginationSpeed: 800,
			rewindSpeed: 1000,
			onDrag: this.handleDragSlider.bind(this)
		});
	}

	public addWidthItem() {
		const $elementement = $('#gridslider_style_3');
		const $gridslider = $('.gridslider-inner');
		const wrapper = $('.owl-stage-outer', $gridslider);

		let cols = 6;
		let heightItem = 312.09;

		if (window.innerWidth > 1024) {
			cols = 5.999;
			heightItem = 330;
		} else if (window.innerWidth <= 1024 && window.innerWidth > 768) {
			cols = 5.999;
			heightItem = 280;
		} else if (window.innerWidth <= 768 && window.innerWidth > 425) {
			cols = 4.579;
			heightItem = 253.88;
		} else if (window.innerWidth <= 425) {
			cols = 3;
			heightItem = 200;
		}

		const widthItem = window.innerWidth / cols;
		const widthadd = widthItem * 3;
		const twoItem = $('.two-item', $elementement);
		const nbTwoItem = twoItem.length * widthItem;
		const oneItem = $('.one-item', $elementement).length * widthadd;

		let wrapItem = window.innerWidth;
		wrapper.width(window.innerWidth);
		wrapper.css('overflow', 'hidden');

		this.setState({ width: window.innerWidth / cols, height: heightItem / 2 });

		$('.one-item', $elementement).parent().width(this.state.width * 2);
		$('.two-item', $elementement).parent().width(this.state.width);
		$('.one-item', $elementement).parent().height(this.state.height * 2);
		$('.two-item', $elementement).parent().height(this.state.height);

		$('.one-item img', $elementement).width(this.state.width * 2);
		$('.two-item img', $elementement).width(this.state.width);
		$('.one-item img', $elementement).height(this.state.height * 2);
		$('.two-item img', $elementement).height(this.state.height);

		$('.owl-stage', $elementement).width(widthadd);

		if (window.innerWidth > 768) {
			wrapItem = (nbTwoItem + oneItem) * 2;
		} else if (window.innerWidth <= 768 && window.innerWidth > 425) {
			wrapItem = nbTwoItem + oneItem;
		} else if (window.innerWidth <= 425) {
			wrapItem = nbTwoItem + oneItem;
		}

		$('.owl-stage', $elementement).width(wrapItem);

		const itemActive = $('.owl-item').find('.active');
		if (itemActive.length > 1) {
			this.getAnimate(itemActive, $gridslider);
		} else {
			const item = $('.owl-item');
			item.css({
				opacity: 1,
				filter: 'alpha(opacity = 100)'
			});
		}

		if (window.innerWidth <= 425) {
			const swipeDiv = $('.swipe');
			const render = '<img src="' + swipe + '"/>';
			$(swipeDiv).empty();
			$(swipeDiv).append(render);
			$('.bg-blur').width(window.innerWidth).height(this.state.height * 2);
			setTimeout(() => {
				$(swipeDiv).empty(), $('.bg-blur').css('background', 'none');
			}, 5000);
		} else {
			$('.bg-blur').css('background', 'none');
		}
	}

	public renderVideo() {
		if ($('.item-video').length > 0) {
			const itemVideo = $('.item-video');
			$('img.img-youtube', itemVideo).width(this.state.width).height(this.state.height).css({
				'object-fit': 'cover',
				'object-position': 'center'
			});
		}

		$('.item-map img').width(this.state.width).height(this.state.height).css({
			'object-fit': 'cover',
			'object-position': 'center'
		});
	}

	public getAnimate($element: any, $gridslider: any) {
		const effect = 'slideLeft';
		const duration = 600;
		const delay = 300;
		$gridslider.removeClass('gridf-animate');
		$element.each(function(this: any, i: any) {
			const $ele = $(this);
			$($ele)
				.css({
					'-webkit-animation': effect + ' ' + duration + 'ms ease both',
					'-moz-animation': effect + ' ' + duration + 'ms ease both',
					'-o-animation': effect + ' ' + duration + 'ms ease both',
					animation: effect + ' ' + duration + 'ms ease both',
					'-webkit-animation-delay': +i * delay + 'ms',
					'-moz-animation-delay': +i * delay + 'ms',
					'-o-animation-delay': +i * delay + 'ms',
					'animation-delay': +i * delay + 'ms'
				})
				.animate({
					opacity: 1,
					filter: 'alpha(opacity = 100)'
				});
			if (i === $element.size() - 1) {
				$gridslider.addClass('grid-animate');
			}
		});
	}

	public renderLightGallery() {
		lightbox.option({
			resizeDuration: 200,
			wrapAround: true
		});

		const dataContainer = $('.lb-dataContainer');
		$('.lb-outerContainer').before(dataContainer);
	}

	public handleOnClick(event: any) {
		const target = $(event.target);
		if ($(target).attr('class') === 'ant-modal-wrap ') {
			this.setState({ visible: false });
		}

		const element = $(event.target).parent()[0];
		if ($(element).attr('class') === 'owl-next') {
			$('.owl-prev').css('display', 'block');
		}
		if ($(element).attr('class') === 'owl-prev disabled' && $('.owl-prev').css('display') === 'block') {
			$('.owl-prev').css('display', 'none');
		}
	}

	public handleDragSlider(event: any) {
		const swipeDiv = $('.swipe');
		$(swipeDiv).empty();
		$('.bg-blur').css('background', 'none');
	}

	public handelMapModal = () => {
		this.setState({
			visible: true
		});
	};

	handleValidation(input: any) {
		let { name, email }: any = this.state;
		let errors: any = [];
		let formIsValid = true;

		switch (input) {
			case 'name':
				if (!name) {
					formIsValid = false;
					errors['name'] = 'This input cannot be empty';
				}
				break;
			case 'email':
				if (!email) {
					formIsValid = false;
					errors['email'] = 'This input cannot be empty';
				} else {
					let lastAtPos = email.lastIndexOf('@');
					let lastDotPos = email.lastIndexOf('.');

					if (!(lastAtPos < lastDotPos && lastAtPos > 0 && email.indexOf('@@') == -1 && lastDotPos > 2 && email.length - lastDotPos > 2)) {
						formIsValid = false;
						errors['email'] = 'This input is not valid email';
					}
				}
				break;
		}

		this.setState({ errors: errors });
		return formIsValid;
	}

	public handleSubmit = (e: any) => {
		e.preventDefault();
		const { name, email, phone, detail } = this.state;
		console.log(name, email, phone, detail);
	};

	public handleNameChange(e: any) {
		e.preventDefault();
		let name: any = this.state.name;
		name = e.target.value;
		$.when(this.setState({ name })).then(async () => {
			await this.handleValidation('name');
		});
	}

	public handleEmailChange(e: any) {
		let email: any = this.state.email;
		email = e.target.value;
		$.when(this.setState({ email })).then(async () => {
			await this.handleValidation('email');
		});
	}

	public handlePhoneChange(e: any) {
		let phone: any = this.state.phone;
		phone = e.target.value;
		this.setState({ phone });
	}

	public handleDetailChange(e: any) {
		let detail: any = this.state.detail;
		detail = e.target.value;
		this.setState({ detail });
	}

	public renderGridSlider(pictures: any) {
		let render = [] as any;
		let twoDiv = [] as any;
		let twoItem = 0;
		pictures.map((picture: any, index: any) => {
			if (picture.type === 'main') {
				render.push(
					<div className='item one-item' key={'item-' + index}>
						<div className='item-wrap' key={'item-' + picture.type + '-' + index}>
							<div className='item-wrap-inner'>
								<div className='item-image'>
									<a href={picture.link} data-lightbox='image'>
										<img src={picture.link} />
									</a>
								</div>
							</div>
						</div>
					</div>
				);
			} else if (picture.type === 'video') {
				if (twoDiv.length === 0) {
					twoDiv.push(
						<div className='item-wrap' key={'item-' + picture.type + '-' + index}>
							<div className='item-wrap-inner'>
								<div className='item-video'>
									<a className='play-video' data-video-id='poLKu-exm0M' data-channel='youtube'>
										<img className='img-youtube' src='https://img.youtube.com/vi/poLKu-exm0M/maxresdefault.jpg' />
										<div className='button-youtube'>
											<svg height='100%' version='1.1' viewBox='0 0 68 48' width='100%'>
												<path
													className='ytp-large-play-button'
													d='M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z'
													fill='#212121'
													fillOpacity='0.8'
												/>
												<path d='M 45,24 27,14 27,34' fill='#fff' />
											</svg>
										</div>
									</a>
								</div>
							</div>
						</div>
					);
				}
				if (twoDiv.length === 2) {
					render.push(
						<div className='item two-item' key={'item-' + index}>
							{twoDiv.map((div: any) => div)}
						</div>
					);
					twoDiv = [];
				}
			} else if (picture.type === 'map') {
				if (twoDiv.length === 1) {
					const apiKey = 'AIzaSyBobyTTiskP_YfQXcokYGmND1ouViqCX8w';
					const location = `${picture.location.lat},${picture.location.lng}`;
					const linkImage = `https://maps.googleapis.com/maps/api/staticmap?center=${location}&zoom=14&size=400x400&markers=${location}&key=${apiKey}`;
					twoDiv.push(
						<div className='item-wrap' key={'item-' + picture.type + '-' + index}>
							<div className='item-wrap-inner'>
								<div className='item-map' onClick={this.handelMapModal}>
									<a id='item-map' data-latlng={location}>
										<img src={linkImage} />
									</a>
								</div>
							</div>
						</div>
					);
				}
				if (twoDiv.length === 2) {
					render.push(
						<div className='item two-item' key={'item-' + index}>
							{twoDiv.map((div: any) => div)}
						</div>
					);
					twoDiv = [];
				}
			} else if (picture.type === 'small') {
				if (twoDiv.length === 0) {
					twoItem = 1;
					twoDiv.push(
						<div className='item-wrap' key={'item-' + picture.type + '-' + (index + twoItem)}>
							<div className='item-wrap-inner'>
								<div className='item-image'>
									<a href={picture.link} data-lightbox='image'>
										<img src={picture.link} />
									</a>
								</div>
							</div>
						</div>
					);
					if (pictures[index + 1] === undefined) {
						render.push(
							<div className='item two-item' key={'item-' + index}>
								{twoDiv.map((div: any) => div)}
							</div>
						);
						twoDiv = [];
						twoItem = 0;
					}
				} else if (twoDiv.length === 1) {
					twoItem = 2;
					twoDiv.push(
						<div className='item-wrap' key={'item-' + picture.type + '-' + (index + twoItem)}>
							<div className='item-wrap-inner'>
								<div className='item-image'>
									<a href={picture.link} data-lightbox='image'>
										<img src={picture.link} />
									</a>
								</div>
							</div>
						</div>
					);
				}
				if (twoDiv.length === 2) {
					render.push(
						<div className='item two-item' key={'item-' + index}>
							{twoDiv.map((div: any) => div)}
						</div>
					);
					twoDiv = [];
					twoItem = 0;
				}
			}
		});
		return (
			<div className='gridslider-inner theme3 owl-carousel owl-theme grid-animate' data-effect='slideLeft'>
				{render}
			</div>
		);
	}

	public renderModalMap = () => (
		<Modal className={style.modal} visible={this.state.visible} footer={null} maskClosable={true} closable={false}>
			<GoogleMapReact
				bootstrapURLKeys={{ key: 'AIzaSyBobyTTiskP_YfQXcokYGmND1ouViqCX8w' }}
				defaultCenter={this.state.center}
				defaultZoom={this.state.zoom}
				yesIWantToUseGoogleMapApiInternals
			/>
		</Modal>
	);

	public renderModelVideo() {
		const video = $('.play-video');
		($(video) as any).modalVideo({
			autoplay: 1,
			cc_load_policy: 1,
			color: null,
			controls: 1,
			disablekb: 0,
			enablejsapi: 0,
			end: null,
			fs: 1,
			h1: null,
			iv_load_policy: 1,
			list: null,
			listType: null,
			loop: 0,
			modestbranding: null,
			origin: null,
			playlist: null,
			playsinline: null,
			rel: 0,
			showinfo: 1,
			start: 0,
			wmode: 'transparent',
			theme: 'dark',
			allowFullScreen: true,
			animationSpeed: 300
		});
	}

	public renderPropertyIcon(propertyIcons: any) {
		let render = null;
		let list = [] as any;
		propertyIcons.map((propertyIcon: any, index: any) => {
			let icon = null;
			let title = '';
			const width = 100 / propertyIcons.length;
			switch (propertyIcon.name) {
				case 'Unit Area':
					icon = plans;
					title = 'Size (Sq.m)';
					break;
				case 'Bathrooms':
					icon = baths;
					title = 'Baths';
					break;
				case 'Bedrooms':
					icon = beds;
					title = 'Beds';
					break;
				case 'Price':
					icon = price;
					title = 'Price / Sq.m';
					break;
			}

			list.push(
				<li className='col' key={'icon' + index} style={{ width: width + '%' }}>
					<img src={icon} alt='Unit Area' />
					<h5>{title}</h5>
					<div>{propertyIcon.text}</div>
				</li>
			);
		});

		render = <ul className='property-icon'>{list}</ul>;
		return render;
	}

	public renderPropertyShortInformation = () => (
		<Col className='property-short-information' sm={{ span: 24 }} md={{ span: 24 }} lg={{ span: 14 }}>
			<h3 className='short-information'>
				<span>Property address, District, Area, Province</span>
			</h3>
		</Col>
	);

	public askMore() {
		const position = $('#contact-us').offset() as any;
		$('html,body').animate({ scrollTop: position.top }, 300);
	}

	public renderSocialShare() {
		const socials = [ 'facebook', 'twitter', 'line', 'email' ];
		let content = [] as any;
		let contentSocials = null;
		const url = document.URL;
		const size = 32;
		socials.map((social: any, index: any) => {
			let list = null;
			switch (social) {
				case 'facebook':
					list = (
						<FacebookShareButton key={'button' + index} url={url}>
							<FacebookIcon size={size} />
						</FacebookShareButton>
					);
					break;
				case 'twitter':
					list = (
						<TwitterShareButton key={'button' + index} url={url}>
							<TwitterIcon size={size} />
						</TwitterShareButton>
					);
					break;
				case 'line':
					list = (
						<LineShareButton key={'button' + index} url={url}>
							<LineIcon size={size} />
						</LineShareButton>
					);
					break;
				case 'email':
					list = (
						<EmailShareButton key={'button' + index} url={url}>
							<EmailIcon size={size} />
						</EmailShareButton>
					);
					break;
			}
			content.push(list);
		});

		contentSocials = <div className='social-icons'>{content}</div>;

		return (
			<Col className='property-header-social-share' sm={{ span: 24 }} md={{ span: 24 }} lg={{ span: 10 }}>
				<div className='social-share'>
					<Button>
						<Icon type='printer' />Print
					</Button>
					<Popover className='social-share-popover' content={contentSocials}>
						<Button>
							<Icon type='share-alt' />Share
						</Button>
					</Popover>
					<Button type='primary' onClick={this.askMore}>
						<Icon type='phone' />Ask More
					</Button>
				</div>
			</Col>
		);
	}

	public renderPropertyDetail = () => (
		<div className='description-unit'>
			Property detail lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
			aliqua. ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat_ Duis aute irure dolor
			in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
			culpa qui officia deserunt mollit anim id est laborum.
			<br />
			<br />
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ut enim ad
			minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat_ Duis aute irure dolor in reprehenderit in
			voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			deserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
			laborum.
		</div>
	);

	public renderPropertyFeatures(propertyFeatures: any) {
		let render = null;
		let list = [] as any;
		propertyFeatures.map((propertyFeature: any, index: any) => {
			list.push(
				<Col key={'col-' + index} className='list' sm={{ span: 24 }} md={{ span: 12 }} lg={{ span: 12 }}>
					<Icon type='check-circle' theme='twoTone' twoToneColor='#52c41a' />
					{propertyFeature}
				</Col>
			);
		});

		render = (
			<div className='project-features'>
				<div className='title_section'>
					<h3>Project Features</h3>
				</div>
				<div className='contant_section'>
					<div className='PropertyFeatures'>
						<Row className='features-list'>{list}</Row>
					</div>
				</div>
			</div>
		);
		return render;
	}

	public renderPropertyInformation(propertyInformations: any) {
		let render = null;
		let list = [] as any;
		propertyInformations.map((propertyInformation: any, index: any) => {
			list.push(
				<tr key={'info-' + index}>
					<td>{propertyInformation.title}</td>
					<td>{propertyInformation.detail}</td>
				</tr>
			);
		});

		render = (
			<div className='property-information'>
				<h3>Property information </h3>
				<div className='datagrid'>
					<table>
						<tbody>{list}</tbody>
					</table>
				</div>
			</div>
		);
		return render;
	}

	public renderContactUsForm() {
		const prefixSelector = (
			<Select defaultValue='66' style={{ width: 70 }}>
				<Option key='66' value='66'>
					+66
				</Option>
				<Option key='87' value='87'>
					+87
				</Option>
			</Select>
		);

		const render = (
			<Col className='contact-us' id='contact-us' sm={{ span: 24 }} md={{ span: 12 }} lg={{ span: 24 }}>
				<Form className='contact-us-form' onSubmit={this.handleSubmit}>
					<div className='title_section'>
						<h3>Contact us</h3>
					</div>
					<Form.Item className='form-item'>
						<Input placeholder='Name' onChange={this.handleNameChange.bind(this)} value={this.state.name} />
						<span style={{ color: 'red' }}>{this.state.errors.name}</span>
					</Form.Item>
					<Form.Item className='form-item'>
						<Input placeholder='Email' onChange={this.handleEmailChange.bind(this)} value={this.state.email} />
						<span style={{ color: 'red' }}>{this.state.errors.email}</span>
					</Form.Item>
					<Form.Item className='form-item'>
						<Input
							addonBefore={prefixSelector}
							placeholder='Phone'
							maxLength={9}
							onChange={this.handlePhoneChange.bind(this)}
							value={this.state['phone']}
						/>
						<span style={{ color: 'red' }}>{this.state.errors.phone}</span>
					</Form.Item>
					<Form.Item className='form-item'>
						<TextArea
							rows={4}
							placeholder='Please send me more detail abount this property'
							onChange={this.handleDetailChange.bind(this)}
							value={this.state['detail']}
						/>
					</Form.Item>
					<Form.Item className='button-send'>
						<Button type='primary' htmlType='submit'>
							Send
						</Button>
					</Form.Item>
				</Form>
			</Col>
		);
		return render;
	}

	public renderAgent = () => {
		const email = 'agent@email.com';
		const href = 'mailto:' + email + '?subject=Interested%20the%20property';
		return (
			<Col xs={{ span: 24 }} md={{ span: 12 }} lg={{ span: 24 }} className='agent'>
				<Col className='list-aget' span={5}>
					<img className='agent-image' src='https://image.flaticon.com/icons/svg/1029/1029023.svg' />
				</Col>
				<Col className='list-aget' span={11}>
					<div className='agen-detail'>
						<p className='agent-name'>Agent Name</p>
						<p className='agent-phone'>Phone : +88 8888 888</p>
						<a className='agent-email'>Email : agent@email.com</a>
					</div>
				</Col>
				<Col className='list-aget' span={5}>
					<div className='agent-contect-button'>
						<a href='tel:+88 8888 888'>
							<Button className='agent-button'>
								<Icon type='phone' /> Call
							</Button>
						</a>
						<a href={href}>
							<Button className='agent-button'>
								<Icon type='mail' /> Mail
							</Button>
						</a>
					</div>
				</Col>
			</Col>
		);
	};

	public onWindowResize = async () => {
		const $elementement = $('#gridslider_style_3');
		const $gridslider = $('.gridslider-inner', $elementement);

		($($gridslider) as any).owlCarousel('destroy');
		await this.renderSlider($gridslider);

		$.when(this.addWidthItem()).then(async () => {
			await this.renderVideo();
		});
	};

	public componentWillMount = () => {
		window.addEventListener('resize', this.onWindowResize);
		window.addEventListener('click', this.handleOnClick.bind(this));
	};

	public componentWillUnmount() {
		window.removeEventListener('resize', this.onWindowResize);
		window.removeEventListener('click', this.handleOnClick.bind(this));
	}

	public componentDidMount = async () => {
		const $elementement = $('#gridslider_style_3');
		const $gridslider = $('.gridslider-inner', $elementement);

		window.addEventListener('resize', this.onWindowResize);
		window.addEventListener('click', this.handleOnClick.bind(this));

		this.setBrowerTitle();

		await this.renderSlider($gridslider);

		$.when(this.addWidthItem()).then(async () => {
			await this.renderVideo();
			await this.renderModelVideo();
			await this.renderLightGallery();
		});

		this.onWindowResize();
	};

	public render() {
		const pictures = [
			{
				type: 'main',
				link:
					'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80'
			},
			{
				type: 'video',
				link:
					'https://images.unsplash.com/photo-1506054913362-92f08ae969f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1498&q=80'
			},
			{
				type: 'map',
				location: { lat: 13.7363877, lng: 100.5611495 }
			},
			{
				type: 'small',
				link:
					'https://images.unsplash.com/photo-1523217582562-09d0def993a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80'
			},
			{
				type: 'small',
				link:
					'https://images.unsplash.com/photo-1527030280862-64139fba04ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1206&q=80'
			},
			{
				type: 'small',
				link:
					'https://images.unsplash.com/photo-1468824357306-a439d58ccb1c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1254&q=80'
			},
			{
				type: 'small',
				link:
					'https://images.unsplash.com/photo-1561753757-d8880c5a3551?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80'
			},
			{
				type: 'small',
				link: 'https://images.unsplash.com/photo-1449844908441-8829872d2607?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80'
			},
			{
				type: 'small',
				link:
					'https://images.unsplash.com/photo-1492889971304-ac16ab4a4a5a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1506&q=80'
			},
			{
				type: 'small',
				link:
					'https://images.unsplash.com/flagged/photo-1556438758-8be0c4afe990?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80'
			},
			{
				type: 'small',
				link: 'https://images.unsplash.com/photo-1561503138-cc791ee9cdaf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80'
			},
			{
				type: 'small',
				link: 'https://images.unsplash.com/photo-1561191729-8bdb825b3397?ixlib=rb-1.2.1&auto=format&fit=crop&w=1496&q=80'
			},
			{
				type: 'small',
				link:
					'https://images.unsplash.com/photo-1468824357306-a439d58ccb1c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1254&q=80'
			}
		];
		const propertyIcons = [
			{ name: 'Unit Area', text: '246' },
			{ name: 'Bathrooms', text: '2' },
			{ name: 'Bedrooms', text: '2' },
			{ name: 'Price', text: '฿43,902' }
		];
		const propertyFeatures = [
			'Building Security',
			'Furnished',
			'Lift',
			'Air Conditioning',
			'Gymnasium',
			'CATV/cable',
			'Swimming Pool Outdoor',
			'New Building',
			'Parking',
			'Balcony',
			'Sea View',
			'City Center',
			'Shopping Mall',
			'Bus Station',
			'City view',
			'CCTV',
			'Foreign Ownership',
			'Security System'
		];

		const propertyInformations = [
			{
				title: 'Property type',
				detail: 'House'
			},
			{
				title: 'Location District',
				detail: 'Area, Province'
			},
			{
				title: 'Build',
				detail: '2010'
			},
			{
				title: 'Bedrooms',
				detail: '2'
			},
			{
				title: 'Bathrooms',
				detail: '1'
			},
			{
				title: 'Floor',
				detail: '12A'
			},
			{
				title: 'Size',
				detail: '78 Sq'
			},
			{
				title: 'Land size',
				detail: '120 Sq.m'
			},
			{
				title: 'Price',
				detail: '฿888,888'
			},
			{
				title: 'Price per Sq.m',
				detail: '฿88,888'
			},
			{
				title: 'Garage',
				detail: 'Yes'
			},
			{
				title: 'Elevator',
				detail: 'No'
			},
			{
				title: 'Meteriol',
				detail: 'Concrete'
			},
			{
				title: 'First published',
				detail: '21/04/2015'
			},
			{
				title: 'Last update',
				detail: '22/06/2018'
			}
		];

		return (
			<div className={style.modWebportalPropertyDetailContainer}>
				<div id='gridslider_style_3' className='gridslider'>
					<div className='swipe' />
					{this.renderGridSlider(pictures)}
				</div>
				{this.renderModalMap()}
				<div id='main-property-detail'>
					<div className='container'>
						<div id='property-detail'>
							<div className='description'>
								{this.renderPropertyIcon(propertyIcons)}
								<Row className='property-header'>
									{this.renderPropertyShortInformation()}
									{this.renderSocialShare()}
								</Row>
							</div>
						</div>
					</div>
				</div>
				<div className='property-detail'>
					<div className='container'>
						<Row className='description'>
							<Col className='property-description' sm={{ span: 24 }} md={{ span: 24 }} lg={{ span: 16 }}>
								{this.renderPropertyDetail()}
								<hr />
								{this.renderPropertyFeatures(propertyFeatures)}
								<hr />
								{this.renderPropertyInformation(propertyInformations)}
							</Col>
							<Col className='property-contact' sm={{ span: 24 }} md={{ span: 24 }} lg={{ span: 8 }}>
								<Row>
									{this.renderContactUsForm()}
									<hr />
									{this.renderAgent()}
								</Row>
							</Col>
						</Row>
					</div>
				</div>
			</div>
		);
	}
}

jQuery(document).ready(() => {
	const id = 'modWebportalPropertyDetailUi';
	waitForElement('#' + id, () => {
		const moduleParams = JSON.parse(atob($('#' + id).data('hint')));
		console.log(tag + 'Starting ' + id + ' with params :', moduleParams);
		const l: string = moduleParams.language;
		const currentAppLocale = languages[l];
		ReactDOM.render(
			<Provider store={store}>
				<LocaleProvider locale={currentAppLocale.antd}>
					<IntlProvider locale={currentAppLocale.locale} messages={currentAppLocale.messages}>
						<ModWebportalPropertyDetailUi moduleParams={moduleParams} />
					</IntlProvider>
				</LocaleProvider>
			</Provider>,
			document.getElementById(id)
		);
	});
});
