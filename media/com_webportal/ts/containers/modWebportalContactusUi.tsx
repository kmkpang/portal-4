import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import { store } from '../redux/store';
import { Provider } from 'react-redux';
import * as style from './styles/modWebportalContactusUi.less';
import { waitForElement } from '../helpers/utilities';
import { LocaleProvider, Row, Col, Input, Card, Button, Icon } from 'antd';
import languages from '../language';
import { IntlProvider, intlShape } from 'react-intl';
import TextArea from 'antd/lib/input/TextArea';

const tag = '[ModWebportalContactusUi] ';

interface IProperties {
	moduleParams: any;
	context?: any;
}

// tslint:disable-next-line
interface IState {
	//
}

class ModWebportalContactusUi extends React.PureComponent<IProperties, IState> {
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
		//  const mp = this.props.moduleParams;
		return (
			<div className={style.modWebportalContactusContainer}>
				<img
					className={style.backgroundImg}
					src='https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'
				/>
				<div className={style.contactusContainer}>
					<div className={style.banner}>
						<Row className={style.feature}>
							<Col className={style.colCaption} xs={{ span: 24 }} md={{ span: 24 }}>
								<div className={style.caption}>
									<p className={style.captionHead}>Real Estate Market</p>
									<p className={style.captionHead}>Expert in Asia</p>
									<p className={style.captionDes}>Receive Legal Support As Gift</p>
								</div>
							</Col>
							<Col className={style.colForm} xs={{ span: 24 }} md={{ span: 24 }}>
								<div className={style.form}>
									<Row className={style.rowForm}>
										<Row>
											<Col xs={{ span: 24 }} md={{ span: 11 }} lg={{ span: 11 }}>
												<label>Name</label>
												<Input placeholder='Your full name goes here' />
												<label>Phone Number</label>
												<Input placeholder='Your phone no goes here' />
												<label>E-mail</label>
												<Input placeholder='Your email goes here' />
											</Col>
											<Col xs={{ span: 24 }} md={{ span: 11 }} lg={{ span: 11 }} className={style.colText}>
												<label>Meassage</label>
												<TextArea rows={10} placeholder='Your meassage goes here...' />
											</Col>
										</Row>
										<Row>
											<Col xs={{ span: 24 }} md={{ span: 11 }} lg={{ span: 11 }}>
												<div className={style.metaForm}>
													<p>I agree to the terms and condition click here to read privacy statement.</p>
													<a href='#'>Click here to read privacy statement</a>
												</div>
											</Col>
											<Col xs={{ span: 24 }} md={{ span: 11 }} lg={{ span: 11 }} className={style.colText}>
												<div className={style.buttonForm}>
													<Button size='large' className={style.buttonBuy} type='primary'>
														BUY PROPERTY WITH AN AGENT &nbsp; >>
													</Button>
												</div>
											</Col>
										</Row>
									</Row>
								</div>
							</Col>
						</Row>
					</div>
				</div>
				<div className={style.content}>
					<Row className={style.contentRow}>
						<Col className={style.contentCol} xs={{ span: 24 }} md={{ span: 12 }} lg={{ span: 8 }}>
							<Card className={style.contentCard}>
								<div className={style.contentHeader}>
									<Icon className={style.contentIcon} type='smile-o' />
									<p className={style.contentTitle}>Profitable Cooperation</p>
								</div>
								<p className={style.contentDescription}>
									Intrinsic cognitive load is the effort associated with a specific topic, extraneous cognitive load refers to the
									way information
								</p>
							</Card>
						</Col>
						<Col className={style.contentCol} xs={{ span: 24 }} md={{ span: 12 }} lg={{ span: 8 }}>
							<Card className={style.contentCard}>
								<div className={style.contentHeader}>
									<Icon className={style.contentIcon} type='smile-o' />
									<p className={style.contentTitle}>Transaction Security</p>
								</div>
								<p className={style.contentDescription}>
									Intrinsic cognitive load is the effort associated with a specific topic, extraneous cognitive load refers to the
									way information
								</p>
							</Card>
						</Col>
						<Col className={style.contentCol} xs={{ span: 24 }} md={{ span: 12 }} lg={{ span: 8 }}>
							<Card className={style.contentCard}>
								<div className={style.contentHeader}>
									<Icon className={style.contentIcon} type='smile-o' />
									<p className={style.contentTitle}>Low Price Guranteed</p>
								</div>
								<p className={style.contentDescription}>
									Intrinsic cognitive load is the effort associated with a specific topic, extraneous cognitive load refers to the
									way information
								</p>
							</Card>
						</Col>
					</Row>
				</div>
			</div>
		);
	}
}

jQuery(document).ready(() => {
	const id = 'modWebportalContactusUi';
	waitForElement('#' + id, () => {
		const moduleParams = JSON.parse(atob(jQuery('#' + id).data('hint')));
		console.log(tag + 'Starting ' + id + ' with params :', moduleParams);
		const l: string = moduleParams.language;
		const currentAppLocale = languages[l];
		ReactDOM.render(
			<Provider store={store}>
				<LocaleProvider locale={currentAppLocale.antd}>
					<IntlProvider locale={currentAppLocale.locale} messages={currentAppLocale.messages}>
						<ModWebportalContactusUi moduleParams={moduleParams} />
					</IntlProvider>
				</LocaleProvider>
			</Provider>,
			document.getElementById(id)
		);
	});
});
