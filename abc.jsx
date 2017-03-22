
class Row extends React.Component {
  constructor() {
    super();
    this.state = {
      isChecked: false,
    };
    this.handleChange = this.handleChange.bind(this);
  }
  handleChange() {
    const checkBadge = this.state.isChecked == false;
    this.setState({ isChecked: checkBadge });
  }
  render() {
    const Badge = this.state.isChecked == true ? <span className="badge">Completed</span> : '';
    console.log(this.props.name);
    return (
      <li className="list-group-item">
        <input type="checkbox" onClick={this.handleChange} name="isChecked" className="form-check-input" />{this.props.name} {Badge}
      </li>
    );
  }
}
class List extends React.Component {
  render() {
    const listRow = <Row name={this.props.name} />;
    const listTodo = this.props.name == '' ? '' : listRow;
    return (
      <ul className="list-group">
        <label>TODO App</label>
        <br />
        {listTodo}
      </ul>
    );
  }
}
// add form
class AddTodo extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      input: '',
    };
    this.addTodo = this.addTodo.bind(this);
    this.handleClick = this.handleClick.bind(this);
  }
  addTodo(e) {
    this.setState({ input: e.target.value });
  }
  handleClick(e) {
    e.preventDefault();
    const name = this.state.input;
    this.props.handleClick(name);
    this.setState({ input: '' });
  }
  render() {
    return (
      <form >
        <div className="form-group">
          <input type="text" className="form-control" rel="newName" onChange={() => this.props.newName(this.refs.newName.value)} value={this.state.input} placeholder="Your Todo.." />
        </div>
        <button type="submit" className="btn btn-default" onClick={this.handleClick}>Submit</button>
      </form>
    );
  }
}
// display result
class InputText extends React.Component {
  constructor(props) {
    super(props);
    this.list = {
      name: '',
      marked: false,
      key: -1,
    };
    this.state = {
      todoList: [],
      currList: clone(this.list),
    };
    this.GetName = this.GetName.bind(this);
  }
  GetName(newName) {
    if (newName.key !== -1) {
      let list = this.state.list;
      list = map(list, (e) => {
        if (e.key == newName.key) {
          e.name = newName.name;
        }
        return e;
      });
      this.setState({
        list,
        currList: clone(this.list),
      });
    } else {
      const list = this.state.list;
      list.unshift({ name: newName.name, marked: false, key: new Date().getTime() });
      this.setState({
        list,
        currList: clone(this.list),
      });
    }
  }
  render() {
    return (
      <div className="col-md-5" >
        <List name={this.state.todoList} />
        <AddTodo onChange={this.GetName} />
      </div>
    );
  }
}

ReactDOM.render(<InputText />, document.getElementById('container'));
