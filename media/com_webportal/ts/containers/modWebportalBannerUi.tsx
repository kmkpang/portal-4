import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import { store } from '../redux/store';
import { Provider } from 'react-redux';
import * as style from './styles/modWebportalBannerUi.less';
import { waitForElement } from '../helpers/utilities';
import { Button, LocaleProvider } from 'antd';
import languages from '../language';
import { IntlProvider, intlShape } from 'react-intl';
import * as marked from 'marked';

const tag = '[ModWebportalBannerUi] ';

interface IProperties {
	moduleParams: any;
	context?: any;
}

// tslint:disable-next-line
interface IState {
	//
}

class ModWebportalBannerUi extends React.PureComponent<IProperties, IState> {
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

	public render() {
		const mp = this.props.moduleParams;
		const imageUrl =
			mp.background_image && mp.background_image.indexOf('http') !== -1 ? mp.background_image : (window as any).uriRoot + mp.background_image;
		return (
			<div className={style.modWebportalBannerContainer}>
				<div className='container-banner'>
					<div className='banner'>
						<div className='banner-content'>
							<div className='banner-slogan' dangerouslySetInnerHTML={{ __html: marked(mp.banner_slogan, { sanitize: false }) }} />
							{mp.button_text && mp.button_text.trim().length > 0 ? (
								<a href={mp.button_url}>
									<Button className='banner-button' type='primary'>
										{mp.button_text}
									</Button>
								</a>
							) : null}
						</div>
						<div className='banner-image'>
							<img src={imageUrl} />
						</div>
					</div>
				</div>
			</div>
		);
	}
}

jQuery(document).ready(() => {
	const id = 'modWebportalBannerUi';
	const selector = '*[data-type="' + id + '"]';
	waitForElement(selector, (elements: HTMLElement[]) => {
		console.log(tag + ' obtained modWebportalBannerUi divs : ', elements);
		for (const element of elements) {
			const moduleParams = JSON.parse(atob(jQuery('#' + element.id).data('hint')));
			console.log(tag + 'Starting ' + element.id + ' with params :', moduleParams);
			const l: string = moduleParams.language;
			const currentAppLocale = languages[l];
			ReactDOM.render(
				<Provider store={store}>
					<LocaleProvider locale={currentAppLocale.antd}>
						<IntlProvider locale={currentAppLocale.locale} messages={currentAppLocale.messages}>
							<ModWebportalBannerUi moduleParams={moduleParams} />
						</IntlProvider>
					</LocaleProvider>
				</Provider>,
				document.getElementById(element.id)
			);
		}
	});
});
