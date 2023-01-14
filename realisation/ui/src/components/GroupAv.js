import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar';

export class GroupAv extends Component {
    constructor(props){
        super(props)
    }
  render() {
    return (

      <div className='groupAv'>
      <h4>Group Avancement</h4>
          <div className='mt-4'>
            <ProgressBar now={this.props.data} label={`${this.props.data}%`}/>
          </div>
      </div>
    )
  }
}

export default GroupAv