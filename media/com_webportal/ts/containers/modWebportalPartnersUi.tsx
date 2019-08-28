import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import { store } from '../redux/store';
import { Provider } from 'react-redux';
import * as style from './styles/modWebportalPartnersUi.less';
import { waitForElement } from '../helpers/utilities';
import { LocaleProvider } from 'antd';
import languages from '../language';
import { IntlProvider, intlShape } from 'react-intl';
import isEmpty from 'ramda/es/isEmpty';

require('../../../jui/js/owl.carousel.min.js');

const tag = '[ModWebportalPartnersUi] ';

interface IProperties {
	moduleParams: any;
	context?: any;
}

// tslint:disable-next-line
interface IState {
	//
}

class ModWebportalPartnersUi extends React.PureComponent<IProperties, IState> {
	public state = {
		isMobile: false,
		isTablet: false,
		isBrowser: false,
		partners: []
	};

	// @ts-ignore
	private static contextTypes = {
		intl: intlShape
	};

	constructor(props: IProperties) {
		super(props);

		try {
			//
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

	public onWindowResize = () => {
		this.setState({
			isMobile: window.innerWidth < 768,
			isTablet: window.innerWidth >= 768 && window.innerWidth <= 1023,
			isBrowser: window.innerWidth > 1023
		});
	};

	componentWillUnmount() {
		window.removeEventListener('resize', this.onWindowResize);
	}

	componentDidMount() {
		window.addEventListener('resize', this.onWindowResize);
		this.renderOwlCarousel();
	}

	componentWillMount() {
		this.onWindowResize();
	}

	renderOwlCarousel() {
		const slider = $('.slider-inner');
		($(slider) as any).owlCarousel('destroy');
		($(slider) as any).owlCarousel({
			responsiveClass: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 4
				}
			},
			loop: true,
			nav: false,
			dots: false,
			merge: true,
			autoHeight: false,
			autoPlay: true,
			slideSpeed: 1000,
			paginationSpeed: 800,
			rewindSpeed: 1000
		});
	}

	public renderPartners(partners: any) {
		let render = [] as any;
		const size = Object.keys(partners).length;
		if (!isEmpty(partners)) {
			for (let i = 0; i < size; i++) {
				const partner = partners[`partners${i}`];
				const image = partner.image && partner.image.indexOf('http') !== -1 ? partner.image : (window as any).uriRoot + partner.image;
				render.push(
					<div className='item-wrap' key={i}>
						<div className='item-wrap-inner'>
							<div className='item-image'>
								<a href={partner.url} data-lightbox='image'>
									<img src={image} />
								</a>
							</div>
						</div>
					</div>
				);
			}
		}
		return (
			<div className='slider-inner theme3 owl-carousel owl-theme grid-animate' data-effect='slideLeft'>
				{render}
			</div>
		);
	}

	public render() {
		const mp = this.props.moduleParams;
		const partners = mp.partners;
		console.log(partners);
		return (
			<div className={style.modWebportalPartnersContainer}>
				<div className='partners'>
					<div className='partners-title'>Partners</div>
					{this.renderPartners(partners)}
				</div>
			</div>
		);
	}
}

jQuery(document).ready(() => {
	const id = 'modWebportalPartnersUi';
	waitForElement('#' + id, () => {
		const moduleParams = JSON.parse(atob(jQuery('#' + id).data('hint')));
		console.log(tag + 'Starting ' + id + ' with params :', moduleParams);
		const l: string = moduleParams.language;
		const currentAppLocale = languages[l];
		ReactDOM.render(
			<Provider store={store}>
				<LocaleProvider locale={currentAppLocale.antd}>
					<IntlProvider locale={currentAppLocale.locale} messages={currentAppLocale.messages}>
						<ModWebportalPartnersUi moduleParams={moduleParams} />
					</IntlProvider>
				</LocaleProvider>
			</Provider>,
			document.getElementById(id)
		);
	});
});
