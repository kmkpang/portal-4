import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import { store } from '../redux/store';
import { Provider } from 'react-redux';
import * as style from './styles/modWebportalSocialUi.less';
import { waitForElement } from '../helpers/utilities';
import { LocaleProvider } from 'antd';
import languages from '../language';
import { IntlProvider, intlShape } from 'react-intl';
import { FaFacebookF, FaYoutube, FaInstagram, FaLine, FaTwitter, FaWeixin } from 'react-icons/fa';

const tag = '[ModWebportalSocialUi] ';

interface IProperties {
	moduleParams: any;
	context?: any;
}

// tslint:disable-next-line
interface IState {
	//
}

class ModWebportalSocialUi extends React.PureComponent<IProperties, IState> {
	// @ts-ignore
	private static contextTypes = {
		intl: intlShape
	};

	public state = {
		isMobile: false
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
			isMobile: window.innerWidth < 768
		});
	};

	public componentWillMount() {
		this.onWindowResize();
	}

	public componentDidMount() {
		window.addEventListener('resize', this.onWindowResize);
	}

	public componentWillUnmount() {
		window.removeEventListener('resize', this.onWindowResize);
	}

	public renderSocialIcon = (icon: any, social: any) => {
		let render = null;
		if (icon.url !== null || icon.url !== '') {
			let icons = null;
			const iconsColor = '#fff';
			let bgColor = '';

			switch (social) {
				case 'facebook':
					icons = <FaFacebookF />;
					bgColor = 'rgb(60,90,153)';
					break;
				case 'instagram':
					icons = <FaInstagram />;
					bgColor = 'radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%)';
					break;
				case 'line':
					icons = <FaLine />;
					bgColor = 'rgb(3, 195, 2)';
					break;
				case 'twitter':
					icons = <FaTwitter />;
					bgColor = 'rgb(29, 161, 242)';
					break;
				case 'wechat':
					icons = <FaWeixin />;
					bgColor = 'rgb(16, 208, 27)';
					break;
				case 'youtube':
					icons = <FaYoutube />;
					bgColor = 'rgb(255, 0, 0)';
					break;
			}

			if (icon.color_style === 'custom') {
				render = (
					<a className={style.iconSocial} href={icon.url} style={{ backgroundColor: icon.bg_icon_color, color: icon.icon_color }}>
						{icons}
					</a>
				);
			} else {
				render = (
					<a className={style.iconSocial} href={icon.url} style={{ background: bgColor, backgroundColor: bgColor, color: iconsColor }}>
						{icons}
					</a>
				);
			}
		}
		return render;
	};

	public render() {
		const social = this.props.moduleParams.social;
		if (!this.state.isMobile) {
			return (
				<div className={style.modWebportalSocialContainer}>
					{social.facebook === '1' ? this.renderSocialIcon(social.icon_facebook, 'facebook') : ''}
					{social.instagram === '1' ? this.renderSocialIcon(social.icon_instagram, 'instagram') : ''}
					{social.line === '1' ? this.renderSocialIcon(social.icon_line, 'line') : ''}
					{social.twitter === '1' ? this.renderSocialIcon(social.icon_twitter, 'twitter') : ''}
					{social.wechat === '1' ? this.renderSocialIcon(social.icon_wechat, 'wechat') : ''}
					{social.youtube === '1' ? this.renderSocialIcon(social.icon_youtube, 'youtube') : ''}
				</div>
			);
		} else {
			return null;
		}
	}
}

jQuery(document).ready(() => {
	const id = 'modWebportalSocialUi';
	waitForElement('#' + id, () => {
		const moduleParams = JSON.parse(atob(jQuery('#' + id).data('hint')));
		console.log(tag + 'Starting ' + id + ' with params :', moduleParams);
		const l: string = moduleParams.language;
		const currentAppLocale = languages[l];
		ReactDOM.render(
			<Provider store={store}>
				<LocaleProvider locale={currentAppLocale.antd}>
					<IntlProvider locale={currentAppLocale.locale} messages={currentAppLocale.messages}>
						<ModWebportalSocialUi moduleParams={moduleParams} />
					</IntlProvider>
				</LocaleProvider>
			</Provider>,
			document.getElementById(id)
		);
	});
});
