import React, { Component } from "react";
import axios from "axios";
import StudentAv from "./StudentAv";
import BriefAv from "./BriefAv";
import { GroupAv } from './GroupAv';


export default class Header extends Component {
  constructor(props) {
        super(props);
        this.state = {
        years : [],
        group : '',
        studentCount : '',
        valueSelect: '',
        brief_affs : [],
        briefs_av : [],
        group_av : ''
        };
  }
  getDatayears = () => {
    axios.get("http://localhost:8000/api/group").then((res) => {
      this.setState({
        years : res.data
      });
    });
  };

  lastYear = () => {
    axios.get("http://localhost:8000/api/lastY").then((res) => {
      this.setState({
        lastY : res.data.year
      });
    });
  };

   getData = (e) => {
    axios.get('http://localhost:8000/api/group/'+e.target.value).then((res) => {
      this.setState({
        group: res.data.group,
        studentCount: res.data.studentCount,
        brief_affs : res.data.brief_aff[0],
        briefs_av : res.data.briefs,
        group_av : res.data.group_av
      });
    });
  };

  componentDidMount() {
    this.getDatayears()
    this.lastYear()
  }

  render() {
    // console.log(this.state.brief_affs)
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
                <option value={item.id}>{item.Annee_scolaire}</option>
              ))}
            </select>
          </div>

          <div className="row info">
            <div className="col-md-4">
              <img src={this.state.group.Logo} alt="logo"></img>
              <span>{this.state.group.Nom_groupe}</span>
            </div>
            <div className="col-md-4 info">
              <p>{this.state.studentCount} apprenants</p>
            </div>
            <div className="col-md-4"></div>
          </div>
        </div>

        <div className="row etatAv">
            <div className="col-md-6">
                <GroupAv data={this.state.group_av}/>
                <BriefAv data={this.state.briefs_av} />
            </div>
            <div className="col-md-6 etatAvSt">
                <StudentAv data={this.state.brief_affs}/>
            </div>
        </div>
      </div>
    );
  }
}
