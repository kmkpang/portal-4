import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import { store } from '../redux/store';
import { Provider } from 'react-redux';
import * as style from './styles/modWebportalNewAndActivitiesUi.less';
import { waitForElement } from '../helpers/utilities';
import { LocaleProvider, Typography, Col, Row } from 'antd';
import languages from '../language';
import { IntlProvider, intlShape } from 'react-intl';

const { Paragraph } = Typography;

const tag = '[modWebportalNewAndActivitiesUi] ';

const newProject = [
	{
		id: 1,
		name: 'รถไฟฟ้าสีเหลือง ลาดพร้าว-สําโรง ฉุด ราคาที่ดินพุ่ง 5-10% ',
		image:
			'https://images.unsplash.com/photo-1523192193543-6e7296d960e4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
		content:
			'ทว่าการเติบโตของเมืองที่มีแนวโน้มขยายตัวจากกรุงเทพฯชั้นในสู่ทิศตะวันออก ทําให้ทําเลย่าน เทพารักษ์ รถไฟฟ้าสีเหลือง ลาดพร้าว-สําโรง ฉุด ราคาที่ดินพุ่ง 5-10% ทว่าการเติบโตของเมืองที่มีแนวโน้มขยายตัวจากกรุงเทพฯชั้นในสู่ทิศตะวันออก ทําให้ทําเลย่าน เทพารักษ์',
		publishDate: '26th Oct 2018'
	},
	{
		id: 2,
		name: 'อสังหาฯ บางนา บูมรับอานิสงส์รถไฟฟ้า สายใหม่',
		image:
			'https://images.unsplash.com/photo-1455587734955-081b22074882?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
		content:
			'จากพื้นที่อย่างบางนา ปากน้ํา และสมุทรปราการ ที่ในอดีตถูกมองว่าไกล กลายเป็นทําเลที่น่า จับตา อสังหาฯ บางนา บูมรับอานิสงส์รถไฟฟ้า สายใหม่ จากพื้นที่อย่างบางนา ปากน้ํา และสมุทรปราการ ที่ในอดีตถูกมองว่าไกล กลายเป็นทําเลที่น่า จับตา',
		publishDate: '26th Oct 2018'
	},
	{
		id: 3,
		name: 'ในยุคที่ตลาดอสังหาฯ ต่างแข่งขัน “ทาง เลือก” จึงตกอยู่ในมือของผู้บริโภค',
		image:
			'https://images.unsplash.com/photo-1490122417551-6ee9691429d0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80',
		content:
			'จากพื้นที่อย่างบางนา ปากน้ํา และสมุทรปราการ ที่ในอดีตถูกมองว่าไกล กลายเป็นทําเลที่น่า จับตา ในยุคที่ตลาดอสังหาฯ ต่างแข่งขัน “ทาง เลือก” จึงตกอยู่ในมือของผู้บริโภค จากพื้นที่อย่างบางนา ปากน้ํา และสมุทรปราการ ที่ในอดีตถูกมองว่าไกล กลายเป็นทําเลที่น่า จับตา',
		publishDate: '26th Oct 2018'
	},
	{
		id: 4,
		name: 'อสังหาฯ บางนา บูมรับอานิสงส์รถไฟฟ้า สายใหม่',
		image:
			'https://images.unsplash.com/photo-1457377491689-0381aa8d90d9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80',
		content:
			'จากพื้นที่อย่างบางนา ปากน้ํา และสมุทรปราการ ที่ในอดีตถูกมองว่าไกล กลายเป็นทําเลที่น่า จับตา อสังหาฯ บางนา บูมรับอานิสงส์รถไฟฟ้า สายใหม่ จากพื้นที่อย่างบางนา ปากน้ํา และสมุทรปราการ ที่ในอดีตถูกมองว่าไกล กลายเป็นทําเลที่น่า จับตา',
		publishDate: '26th Oct 2018'
	},
	{
		id: 5,
		name: 'บิ๊กดีเวลลอปเปอร์จับมือ ผู้ซื้อได้อะไร?',
		image:
			'https://images.unsplash.com/photo-1493606371202-6275828f90f3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1502&q=80',
		content:
			'จากพื้นที่อย่างบางนา ปากน้ํา และสมุทรปราการ ที่ในอดีตถูกมองว่าไกล กลายเป็นทําเลที่น่า จับตา บิ๊กดีเวลลอปเปอร์จับมือ ผู้ซื้อได้อะไร? จากพื้นที่อย่างบางนา ปากน้ํา และสมุทรปราการ ที่ในอดีตถูกมองว่าไกล กลายเป็นทําเลที่น่า จับตา',
		publishDate: '26th Oct 2018'
	}
];

interface IProperties {
	moduleParams: any;
	context?: any;
}

// tslint:disable-next-line
interface IState {
	//
}

class ModWebportalNewAndActivitiesUi extends React.PureComponent<IProperties, IState> {
	state = {
		width: 100,
		size: 0,
		isMobile: false,
		isTablet: false,
		isBrowser: false
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

	renderGrid(setting: any, project: any, index: any) {
		const { width } = this.state;
		return (
			<div className='card-news-activities' key={`news-activities-${index}`} style={{ width: `${width}%` }}>
				<a href='#'>
					<div className='card-news-activities-detail'>
						{setting.content_image === '1' && (
							<div className='news-activities-image'>
								<img src={project.image} />
							</div>
						)}
						{setting.publish_date === '1' && <div className='news-activities-publish-date'>{project.publishDate}</div>}
						<div className='news-activities-content'>
							<div className='news-activities-name'>{project.name}</div>
							{setting.short_description === '1' && (
								<Paragraph ellipsis={{ rows: 3, expandable: false }} className='news-activities-description'>
									{project.content}
								</Paragraph>
							)}
						</div>
						{setting.read_more_button === '1' && <div className='news-activities-read-more'>Read More</div>}
					</div>
				</a>
			</div>
		);
	}

	renderList(setting: any, project: any, index: any) {
		const width = 100;
		return (
			<Row className='list-news-activities' key={`news-activities-${index}`} style={{ width: `${width}%` }}>
				<a href='#'>
					<Col className='news-activities-image' span={setting.content_image === '1' ? 12 : 0}>
						{setting.content_image === '1' && (
							<div className='news-activities-image'>
								<img src={project.image} />
							</div>
						)}
					</Col>
					<Col className='list-news-activities-detail' span={setting.content_image === '1' ? 12 : 24}>
						<div className='news-activities-content'>
							<div className='news-activities-name'>{project.name}</div>
							{setting.publish_date === '1' && <div className='news-activities-publish-date'>{project.publishDate}</div>}
							{setting.short_description === '1' && (
								<Paragraph ellipsis={{ rows: 3, expandable: false }} className='news-activities-description'>
									{project.content}
								</Paragraph>
							)}
						</div>
						{setting.read_more_button === '1' && <div className='news-activities-read-more'>Read More</div>}
					</Col>
				</a>
			</Row>
		);
	}

	onWindowResize = () => {
		$.when(
			this.setState({
				isMobile: window.innerWidth < 768,
				isTablet: window.innerWidth >= 768 && window.innerWidth <= 1023,
				isBrowser: window.innerWidth > 1023
			})
		).then(() => {
			const { size } = this.state;
			let width = 0;

			if (this.state.isMobile) {
				width = 100;
			} else if (this.state.isTablet) {
				width = 100 / 3;
			} else if (this.state.isBrowser) {
				width = 100 / size;
			}

			this.setState({ width });
		});
	};

	componentWillUnmount() {
		window.removeEventListener('resize', this.onWindowResize);
	}

	componentDidMount() {
		window.addEventListener('resize', this.onWindowResize);
	}

	componentWillMount() {
		const size = newProject.length;
		this.setState({ newProject, size });
		this.onWindowResize();
	}

	public render() {
		const mp = this.props.moduleParams;
		const setting = mp.new_and_activities;
		return (
			<div className={style.modWebportalNewAndActivitiesContainer}>
				{newProject.length > 0 && (
					<div className='news-activities-container'>
						<div className='news-activities-title'>News & Activities</div>
						{setting.display === 'grid' ? (
							<div className='news-activities-list'>
								{newProject.map((project: any, index: any) => this.renderGrid(setting, project, index))}
							</div>
						) : (
							<div className='news-activities-list'>
								{newProject.map((project: any, index: any) => this.renderList(setting, project, index))}
							</div>
						)}

						<a className={`${setting.display}-news-activities-viwe-more`}>View All Our News & Activities >></a>
					</div>
				)}
			</div>
		);
	}
}

jQuery(document).ready(() => {
	const id = 'modWebportalNewAndActivitiesUi';
	waitForElement('#' + id, () => {
		const moduleParams = JSON.parse(atob(jQuery('#' + id).data('hint')));
		console.log(tag + 'Starting ' + id + ' with params :', moduleParams);
		const l: string = moduleParams.language;
		const currentAppLocale = languages[l];
		ReactDOM.render(
			<Provider store={store}>
				<LocaleProvider locale={currentAppLocale.antd}>
					<IntlProvider locale={currentAppLocale.locale} messages={currentAppLocale.messages}>
						<ModWebportalNewAndActivitiesUi moduleParams={moduleParams} />
					</IntlProvider>
				</LocaleProvider>
			</Provider>,
			document.getElementById(id)
		);
	});
});
