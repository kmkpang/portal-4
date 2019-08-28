import * as React from 'react';
import * as ReactDOM from 'react-dom';
import * as jQuery from '../../../jui/js/jquery';
import { store } from '../redux/store';
import { Provider } from 'react-redux';
import * as style from './styles/modWebportalProjectsUi.less';
import { waitForElement } from '../helpers/utilities';
import { LocaleProvider } from 'antd';
import languages from '../language';
import { IntlProvider, intlShape } from 'react-intl';

const tag = '[ModWebportalProjectsUi] ';
const newProject = [
	{
		id: 1,
		name: 'Movenpick Residences Ekkamai',
		picture:
			'https://images.unsplash.com/photo-1523192193543-6e7296d960e4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80'
	},
	{
		id: 2,
		name: 'The Sky Sukhumvit',
		picture:
			'https://images.unsplash.com/photo-1455587734955-081b22074882?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80'
	},
	{
		id: 3,
		name: 'Niche MONO Sukhumvit - Bearing',
		picture:
			'https://images.unsplash.com/photo-1490122417551-6ee9691429d0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80'
	},
	{
		id: 4,
		name: 'The Niche MONO Ratchavipha',
		picture:
			'https://images.unsplash.com/photo-1457377491689-0381aa8d90d9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'
	},
	{
		id: 5,
		name: 'The Niche Pride Thonglor - Phetchaburi',
		picture:
			'https://images.unsplash.com/photo-1493606371202-6275828f90f3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1502&q=80'
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

class ModWebportalProjectsUi extends React.PureComponent<IProperties, IState> {
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

	renderCardProject(project: any, index: any) {
		const { width } = this.state;
		return (
			<div className='card-new-project' key={`new-project-${index}`} style={{ width: `${width}%` }}>
				<a href='#'>
					<div className='card-new-project-detail'>
						<div className='new-project-image'>
							<img src={project.picture} />
						</div>
						<div className='new-project-name'>{project.name}</div>
					</div>
				</a>
			</div>
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
		return (
			<div className={style.modWebportalProjectsContainer}>
				{newProject.length > 0 && (
					<div className='new-project-container'>
						<div className='new-project-title'>New Projects</div>
						<div className='new-project-list'>{newProject.map((project: any, index: any) => this.renderCardProject(project, index))}</div>
						<a className='new-project-viwe-more'>View All Our New Projects >></a>
					</div>
				)}
			</div>
		);
	}
}

jQuery(document).ready(() => {
	const id = 'modWebportalProjectsUi';
	waitForElement('#' + id, () => {
		const moduleParams = JSON.parse(atob(jQuery('#' + id).data('hint')));
		console.log(tag + 'Starting ' + id + ' with params :', moduleParams);
		const l: string = moduleParams.language;
		const currentAppLocale = languages[l];
		ReactDOM.render(
			<Provider store={store}>
				<LocaleProvider locale={currentAppLocale.antd}>
					<IntlProvider locale={currentAppLocale.locale} messages={currentAppLocale.messages}>
						<ModWebportalProjectsUi moduleParams={moduleParams} />
					</IntlProvider>
				</LocaleProvider>
			</Provider>,
			document.getElementById(id)
		);
	});
});
