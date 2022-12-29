import React, { Component } from "react";
import axios from "axios";
import StudentAv from "./StudentAv";
import BriefAv from "./BriefAv";


export default class Header extends Component {
  constructor(props) {
        super(props);
        this.state = {
        years : [],
        group : '',
        studentCount : '',
        valueSelect: ''
        };
  }
  getDatayears = () => {
    axios.get("http://localhost:8000/api/group").then((res) => {
      this.setState({
        years : res.data
      });
    });
  };

   getData = (e) => {
    console.log(e.target.value)
    axios.get('http://localhost:8000/api/group/'+e.target.value).then((res) => {
      this.setState({
        group: res.data.group,
        studentCount: res.data.studentCount
      });
    console.log(res.data)
    });
  };

  componentDidMount() {
    this.getDatayears()
  }

  render() {
    return (
      <div>
        <div className="row">
          <div className="col-md-8">
            <h1>tableau de borde d'état d'avancement</h1>
          </div>
          <div className="col-md-4 selectY">
            <select onChange={this.getData} placeholder="année" id="input">
              <option>Année</option>
              {this.state.years.map((item) => (
                <option value={item.id}>{item.formation_year}</option>
              ))}
            </select>
          </div>

          <div className="row info">
            <div className="col-md-4">
              <img src="" alt="logo"></img>
              <span>{this.state.group.name}</span>
            </div>
            <div className="col-md-4 info">
              <p>{this.state.studentCount} apprenants</p>
            </div>
            <div className="col-md-4"></div>
          </div>
        </div>

        <div className="row etatAv">
            <div className="col-md-6">
                {/* <BriefAv data={this.state.brief_avs}/> */}
            </div>
            <div className="col-md-6 etatAvSt">
                <StudentAv />
            </div>
        </div>
      </div>
    );
  }
}
